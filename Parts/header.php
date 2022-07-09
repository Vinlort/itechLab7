<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ItexLab3</title>
    <script src="../ajax/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
      var selectedProject1;
      var dateMy;
      var selectedProject2;
      var selectedDepartment;

      $("#SelectByProjectAndTimeBtn").click(function(){
        selectedProject1 = document.getElementById('SelectByProjectAndTime').value;
        dateMy = document.getElementById('dateMy1').value;
        $("#AjaxTable").load("../ajax/TextTable.php", {
          selectInfoByProjectAndTime : selectedProject1,
          dateMy1Value : dateMy
        });
      });


      $("#SelectByWorkTimeBtn").click(function(){
        selectedProject2 = document.getElementById('SelectWorkTime').value;
        $.ajax({
          url:'../ajax/XMLTable.php',
          type: 'POST',
          cache: false,
          data:{selectWorkTime : selectedProject2},
          dataType: 'XML',
          success: function() {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../xml/file1.xml', true);
        xhr.responseType = 'document';
        xhr.overrideMimeType('text/xml');
        xhr.onload = function () {
        if (xhr.readyState === xhr.DONE) {
          if (xhr.status === 200) {

            var res = document.getElementById("AjaxTable1");
            var result = "";
            result += "<table style='border-collapse: collapse;' border='1'><tr><td colspan='1' style='text-align:center; color:blue;'>Результат задания 2</td></tr><tr><td>Time(Дней)</td></tr>";
            var rows = xhr.responseXML.firstChild.children;
            for (var i = 0; i < rows.length; i++) {
              result += "<tr>";
              result += "<td>" + rows[i].children[0].textContent + "</td>";
              result += "</tr>";
              }
              result += "</table>";
              res.innerHTML = result;
          }
        }
        };
        xhr.send(null);
          }
      });
      });

      $("#SelectByDepartmentBtn").click(function(){
        selectedDepartment = document.getElementById('SelectCountOfWorkers').value;
        $.get( "../ajax/JSONTable.php",  {selectCountOfWorkers: selectedDepartment}, onAjaxSuccess );
        function onAjaxSuccess(data) {
        var result = "<table style='border-collapse: collapse;' border='1'><tr><td colspan='7' style='text-align:center; color:blue;'>Таблица товаров в выбранном диапозоне</td></tr><tr><td>Count</td></tr>";
        let res = JSON.parse(data);
        var resTable = document.getElementById("AjaxTable3");
        res.forEach(function (item) {
          result += "<tr>";
          result += "<td>" + item.count + "</td>";
          result += "</tr>";
          })
          result += "</table>";
          resTable.innerHTML = result;
        }

      });


    });
    </script>



    <style type="text/css">
    body {
      background: #e3e3e3;
    }
    .RefreshBtn {
      position: absolute;
      right: 100px;
      top: 150px;
    }
    .lblName {
      margin-top: 5px;
      display: block;
    }
    .sbmBtn {
      display: block;
      margin-top: 10px;
    }
    .pInsert {
      color: blue;
      font-weight: bold;
    }
    .InsertDiv {
      border: 1px solid black;
      width:30%;
      margin-top: 5px;
    }
    .InsertDiv1 {
      border: 1px solid black;
      width:100%;
      margin-top: 5px;
    }
    .SelectDiv {
      position: absolute;
      right: 30%;
      top: 455px;
    }
    </style>
  </head>
  <body>
        <p>Роботу виконав студент групи КІУКІ-19-4 Нижник Віталій Валерійович</p>
