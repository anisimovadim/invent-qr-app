const fs = require('fs');
const { PDFDocument, rgb, StandardFonts } = require('pdf-lib');

// Массив объектов с путями до изображений
const data = [
    { imagePath: 'public/storage/images/1023013333.png' },
    { imagePath: 'public/storage/images/1023013412.png' },
    // Добавьте больше объектов по необходимости
];

// Функция для генерации PDF документа
async function generatePdfDocument(data) {
    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage([600, 800]);
    const font = await pdfDoc.embedFont(StandardFonts.Helvetica);

    let y = 750;

    for (const item of data) {
        const imageBytes = fs.readFileSync(item.imagePath);
        const image = await pdfDoc.embedPng(imageBytes);

        page.drawImage(image, {
            x: 50,
            y: y,
            width: 100,
            height: 100,
        });

        y -= 120; // Смещение для следующего изображения
    }

    const pdfBytes = await pdfDoc.save();
    fs.writeFileSync('output.pdf', pdfBytes);
}

generatePdfDocument(data);
