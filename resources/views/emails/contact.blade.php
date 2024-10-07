<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новое сообщение</title>
</head>
<body>
    <h1>Новое сообщение с формы контактов</h1>
    <p><strong>Имя:</strong> {{ $data['fullName'] ?? 'Имя не указано' }}</p>
    <p><strong>Телефон:</strong> {{ $data['phone'] ?? 'Телефон не указан' }}</p>
    @if (!empty($data['birthday']))
        <p><strong>Дата рождения:</strong> {{ $data['birthday'] }}</p>
    @endif
    <p><strong>Гендер:</strong> {{ $data['gender'] ?? 'Гендер не указан' }}</p>
    <p><strong>Возраст:</strong> {{ $data['age'] ?? 'Возраст не указан' }}</p>
    <p><strong>Email отправителя:</strong> {{ $data['email'] ?? 'Email не указан' }}</p>
    <p><strong>Сообщение:</strong> {{ $data['message'] ?? 'Сообщение не указано' }}</p>
</body>
</html>