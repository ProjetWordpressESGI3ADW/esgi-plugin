jQuery(document).ready(function ($) {
    var $form = $("#marvel-form");
    $form.submit(function (ev) {
        ev.preventDefault();
        var heroName = $(this).find("input[name='character_name']").val();
        var apiKey = $(this).data("apiKey");

        if (heroName.length > 0) {
            $.ajax({
                method: "GET",
                url: "http://gateway.marvel.com:80/v1/public/characters?name=" +
                    heroName + "&limit=1&apikey=" + apiKey,

            }).success(function (response) {
                var $result = $(".js-result");
                if (response.data.count > 0) {
                    var hero = response.data.results[0];
                    $result.find(".js-hero-title").html(hero.name);
                    $result.find(".js-hero-desc").html(hero.description);
                    $result.find(".js-hero-img").attr(
                        "src", 
                        hero.thumbnail.path + "." + hero.thumbnail.extension
                    );
                    $result.find(".js-hero-details").attr("href", hero.urls[0].url);
                    $result.find(".js-hero-data").fadeIn();
                } else {
                    $result.find(".js-hero-data").hide();
                    $result
                        .find(".js-hero-title")
                        .html("Couldn't find this hero :(");
                }
            }).fail(function (jqXHR, textStatus) {
                console.debug("jqXHR : " + jqXHR);
                console.debug("textStatus : " + textStatus);
            })
        }
    });
});