function showNews(text){
    $.modal(decodeURIComponent(text).replace(/\+/g, ' '), {
        overlayClose: true
    });
}