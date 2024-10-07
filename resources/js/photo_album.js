$(document).ready(function() {
    var currentIndex = 0;
    var openPhotoDiv = null;

    // Массив фотографий и подписей собираем динамически из DOM
    var fotos = [];
    var titles = [];

    $('.photo-album .cell').each(function(index, element) {
        var photo = $(element).find('img').attr('src');
        var title = $(element).find('div').text();

        fotos.push(photo);
        titles.push(title);
    });

    var openPhoto = function() {
        var imageUrl = fotos[currentIndex];
        var imageTitle = titles[currentIndex];

        if (openPhotoDiv) {
            openPhotoDiv.remove();
            openPhotoDiv = null;
        }

        openPhotoDiv = $('<div></div>').addClass('large-photo');

        var closeButton = $('<span></span>').addClass('close-button').text('x').on('click', function() {
            openPhotoDiv.remove();
            openPhotoDiv = null;
        });

        var largePhotoImg = $('<img>').attr({
            src: imageUrl,
            alt: imageTitle
        }).css({
            'display': 'block',
            'margin': '0 auto'
        });

        var prevButton = $('<span></span>').text('<').addClass('prev-button').on('click', function() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : fotos.length - 1;
            openPhoto();
        });
        
        var nextButton = $('<span></span>').text('>').addClass('next-button').on('click', function() {
            currentIndex = (currentIndex < fotos.length - 1) ? currentIndex + 1 : 0;
            openPhoto();
        });
        
        var titleName = $('<span></span>').text(imageTitle).addClass('largePhotoTitle');
        
        var positionText = $('<span></span>').text((currentIndex + 1) + ' / ' + fotos.length).addClass('largePhotoPosition');

        openPhotoDiv.append(closeButton).append(largePhotoImg).append(prevButton).append(positionText).append(nextButton).append(titleName);

        $('#photo-album').append(openPhotoDiv);
        openPhotoDiv.hide().fadeIn(200);
    };

    // Обработчик клика на фотографии
    $('.photo-album .photo').on('click', function() {
        currentIndex = $(this).parent().index();
        openPhoto();
    });

    // Наведение на фотографию
    $('.photo-album .photo').on('mouseover', function() {
        $(this).css('cursor', 'pointer');
    });
});
