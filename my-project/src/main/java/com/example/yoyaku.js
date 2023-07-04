
function displayCalendar() {
  var calendar = document.getElementById('calendar');
  var date = new Date();
  var year = date.getFullYear();
  var month = date.getMonth();

  var firstDay = new Date(year, month, 1);
  var lastDay = new Date(year, month + 1, 0);

  var table = document.createElement('table');
  var header = table.createTHead();
  var headerRow = header.insertRow();

  var daysOfWeek = ['日', '月', '火', '水', '木', '金', '土'];
  daysOfWeek.forEach(function(day) {
    var cell = headerRow.insertCell();
    cell.textContent = day;
  });

  var body = table.createTBody();
  var row, cell, day;

  for (var i = 0; i < 6; i++) {
    row = body.insertRow();
    for (var j = 0; j < 7; j++) {
      cell = row.insertCell();
      day = (i * 7) + j - firstDay.getDay() + 1;
      if (day > 0 && day <= lastDay.getDate()) {
        cell.textContent = day;
        cell.addEventListener('click', function() {
          var selectedDay = this.textContent;
          var selectedDate = year + '-' + (month + 1).toString().padStart(2, '0') + '-' + selectedDay.toString().padStart(2, '0');
          handleReservation(selectedDate);

          
          this.classList.add('selected');
        });
      }
    }
  }

  calendar.innerHTML = '';
  calendar.appendChild(table);
}

function handleReservation(date) {
  var name = prompt('予約名を入力してください:');
  if (name) {
    displayCalendar();
  }
}

// カレンダーの表示
displayCalendar();
