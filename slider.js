//This code JS file that provides functionality to the slider on the home page.*/
$(document).ready(function()
{
    //Setup variables
    var currentPosition = 0;
    var slides =$('.slide');
    var numberOfSlides = slides.length;
    var speed = 5000;
    var slideShowInterval = setInterval(changePosition, speed);
    
    slides.wrapAll('<div id="dynamicWindow"></div>')

    $('#dynamicWindow').css('width', '300%');

    //New function to change the position of the slides
    function changePosition()
    {
        if(currentPosition == numberOfSlides -1)
        {
            currentPosition = 0;
        }else
        {
            currentPosition++;
        }
        moveSlide();
    }

    //New function to animate the slideshow
    function moveSlide()
    {
        jQuery('#dynamicWindow') .animate({'marginLeft' : (-currentPosition)*100+'%'});
    }
});