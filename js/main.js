console.log('Файл скриптов подключён!');


document.addEventListener('DOMContentLoaded', function () {
  console.log('DOM загружен');
});


// техническая часть - УДАЛИТЬ НА ПРОДАКШЕНЕ!
// получить в консоли элемент, по которому кликнули
document.addEventListener('click', e => console.log(e.target));
