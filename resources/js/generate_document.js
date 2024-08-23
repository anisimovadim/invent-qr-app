import { PDFDocument, StandardFonts } from 'pdf-lib';

export async function generatePdf(data) {
    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage([600, 800]);
    const font = await pdfDoc.embedFont(StandardFonts.Helvetica);

    const imageWidth = 120;
    const imageHeight = 120;
    const marginX = 50;
    const marginY = 50;
    const maxImagesPerRow = Math.floor((page.getWidth() - 2 * marginX) / imageWidth);

    let x = marginX;
    let y = page.getHeight() - marginY - imageHeight;

    for (const item of data) {
        const imageBytes = await fetch(item).then(res => res.arrayBuffer());
        const image = await pdfDoc.embedPng(imageBytes);

        // Проверка, нужно ли переносить изображение на новую строку
        if (x + imageWidth > page.getWidth() - marginX) {
            x = marginX;
            y -= imageHeight + marginY;

            // Проверка, нужно ли переносить изображение на новую страницу
            if (y < marginY) {
                y = page.getHeight() - marginY - imageHeight;
                pdfDoc.addPage([600, 800]);
            }
        }

        page.drawImage(image, {
            x: x,
            y: y,
            width: imageWidth,
            height: imageHeight,
        });

        x += imageWidth + marginX;
    }

    const pdfBytes = await pdfDoc.save();
    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
    const url = URL.createObjectURL(blob);

    // Открываем PDF в новой вкладке
    window.open(url, '_blank');
}
