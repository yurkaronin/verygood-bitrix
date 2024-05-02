document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('input[type="tel"]').forEach(input => {
    // Сохраняем оригинальное значение поля
    let originalValue = input.value;

    // Обработчик для форматирования номера
    function formatPhoneNumber() {
      let value = input.value.replace(/\D+/g, ''); // Удаляем все нецифровые символы
      let formattedValue = '+7 ';

      if (value.length > 1) {
        formattedValue += '(' + value.slice(1, 4);
      }
      if (value.length >= 4) {
        formattedValue += ') ' + value.slice(4, 7);
      }
      if (value.length >= 7) {
        formattedValue += '-' + value.slice(7, 9);
      }
      if (value.length >= 9) {
        formattedValue += '-' + value.slice(9, 11);
      }

      input.value = formattedValue.slice(0, 18); // Ограничиваем длину форматированного номера
    }

    // Обработчик для редактирования номера
    input.addEventListener('input', function (event) {
      if (input.value.length < originalValue.length) {
        // Если пользователь удаляет символы, возвращаем оригинальное значение
        input.value = originalValue;
      } else {
        // Иначе форматируем введенное значение
        formatPhoneNumber();
      }
    });

    // Обработчик для проверки длины номера при отправке формы
    input.closest('form').addEventListener('submit', function (event) {
      let digitsCount = input.value.replace(/\D+/g, '').length;
      if (digitsCount < 11) {
        event.preventDefault();
        alert('Введите корректный номер телефона. Минимум 11 цифр. Пример: +7 918 089 60 09');
      }
    });
  });
});
