import cgi,sys

form = cgi.FieldStorage()        # извлечь данные из формы
print("Contenttype: text/html")  # плюс пустая строка

html1 = """
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{
  font-size: 14pt;
  background-color: lightcyan;
  color: #123;
}
#navigation, nav{
  text-align: center;
  margin-bottom: 30px;
}
#navigation a{
  display: inline-block;
  margin: 0px 15px;
  margin-top: 0px;
}
table{
  margin: auto;
  width: 75%;
}
h1 {
  font-size: 30pt;
  text-align: center;
}
a:visited{
  color: #047700;
}
nav a{
  display: inline-block;
  margin: 0px 15px;
}
#navigation a:hover, nav a:hover{
  text-transform: uppercase;
}
a:hover{
  text-decoration: none;
}
table {
  font-size: 20px;
}
table th {
  font-size: 26px;
  font-weight: bold;
}
table td {
    padding-right: 25px;
}
#footer, footer{
  text-align: center;
  font-size: 12mm;
}
</style>
<table> <tr>
<body>\n
    <nav>
        <a href="html/index.html">Главная страница</a>
        <a href="html/html5.html">Страница с HTML5</a>
        <a href="html/sources.html">Использованные источники</a>
        <a href="html/script.html">Скрипт JS</a>
        <a href="html/form.html">Форма</a>
        <a href="html/lab6.php">lab6</a>
        <a href="html/final_step.html">lab6</a>
    </nav>
<h1>История запросов<h1>\n
<table> <tr>
"""
print (html1)
# печать заголовка таблицы
th = ['Имя','Фамилия','Телефон', 'Почта', 'Файл', 'Уровень подготовки', 'Свободные дни', 'Откуда узнал', 'Дополнительная информация']
for head in th:
    ss = '<td>'+head+'</td>'
    print ( ss)
print ('</tr> <tr>')
f = open('db.txt')
tr = []
for line in f:
    if(line == '$$$\n'):
        print ('</tr> <tr>')
    else:
        print('<td> %s </td>' % line)
f.close()

data = ['','','','','','','','',''];    
i=0
for field in ('name','surname','phone_number', 'email','file', 'level', 'days', 'how_hear_about_us', 'add_info'):
    if not field in form:
        data[i] = '(unknown)'
    else:
        if not isinstance(form[field], list):
            data[i] = form[field].value
        else:
            values = [x.value for x in form[field]]
            data[i] = ', '.join(values)
    i+=1
for el in data:
   print ('<td> %s </td>'% el)

print ('</tr> </table> <footer> <a href="#top">Наверх</a> </footer>')
print('</body></html>')

f = open('db.txt','a')

for i in data:
    f.write(str(i)+'\n')

f.write('$$$\n')
f.close()

