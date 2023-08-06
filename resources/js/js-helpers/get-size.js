const sidebar = document.querySelector('.row');

// Получение вычисленного значения высоты элемента sidebar в пикселях
const pixelHeight = sidebar.offsetHeight;

// Определение базового размера шрифта для документа
const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);

// Пересчет высоты элемента sidebar в rem
const remHeight = pixelHeight / rootFontSize;

// Вывод значения высоты в консоль
console.log(`Высота элемента sidebar в rem: ${remHeight}rem`);
