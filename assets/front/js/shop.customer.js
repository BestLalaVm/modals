/**
 * Created by BestLala on 2/25/2017.
 */
$(function () {
    $('.carousel').carousel();
    var carIndex=0;
    $('#carousel-example-generic').on('slide.bs.carousel', function (evt) {
        var $element =$(evt.currentTarget||evt.target);
        var maxCarIndex =$element.find("ol.carousel-indicators .carousel_item").length -1;
        carIndex++;

        if(carIndex>maxCarIndex)
        {
            carIndex=0;
        }
        $element.find(".carousel_item").removeClass("active");
        $element.find(".carousel_relative"+carIndex).addClass("active");
    })
});
