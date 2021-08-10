<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>이름</th>
            <td><?php echo $strName; ?></td>
            <th>이메일</th>
            <td><?php echo $strMail; ?></td>
        </tr>
        <tr>
            <th>연락처</th>
            <td><?php echo $strPhone; ?></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><?php echo $strMessage; ?></td>
        </tr>
    </table>
</body>
</html>