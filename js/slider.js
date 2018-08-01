var slider = $('#slider');
var sig = $('#btn-next');
var ant = $('#btn-prev');

$('#slider section:last').insertBefore('#slider section:first');

slider.css('margin-left', '-100%');

function moveToRight(){
    slider.animate({
        marginLeft: '-200%' 
    },700, function(){
        $('#slider section:first').insertAfter('#slider section:last');
        slider.css('margin-left', '-100%');
    });
}

function moveToLeft(){
    slider.animate({
        marginLeft: '0' 
    },700, function(){
        $('#slider section:last').insertBefore('#slider section:first');
        slider.css('margin-left', '-100%');
    });
}

sig.on('click', function(){
    moveToRight();
});

ant.on('click', function(){
    moveToLeft();
});

function autoPlay(){
    interval = setInterval(function(){
        moveToRight();
    },5000);
}



autoPlay();