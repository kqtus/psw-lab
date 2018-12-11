function getImagesStats() {
    var imgsCount = document.images.length;
    var maxImgWidth = 0;
    var maxImgHeight = 0;
    var maxImgName = "";

    for (var i = 0; i < document.images.length; i++) {
        var curImg = document.images[i];
        var curImgWidth = curImg.width;
        var curImgHeight = curImg.height;

        if (curImgHeight * curImgWidth >= maxImgHeight * maxImgWidth) {
            maxImgHeight = curImgHeight;
            maxImgWidth = curImgWidth;
            maxImgName = curImg.src;
        }
    }

    return [imgsCount, maxImgWidth, maxImgHeight, maxImgName];
}

function getAnchorsStats() {
    var anchorsCount = document.anchors.length;
    var anchorsNames = [];
    var anchorsWithEvenIds = [];

    for (var i = 0; i < document.anchors.length; i++) {
        anchorsNames.push(document.anchors.item(i).name)
        if (i % 2 == 0)
            anchorsWithEvenIds.push(document.anchors.item(i));
    }

    var anchorName = prompt("Please type anchor name", "");
    var idOfTypedAnchor = document.anchors.namedItem(anchorName);

    return [anchorsCount, anchorsNames, anchorsWithEvenIds, idOfTypedAnchor];
}

function getLinksStats() {
    var linksCount = document.links.length;
    var uniqueHosts = new Set();
    var mostPopularHost = "";

    for (var i = 0; i < linksCount; i++) {
        uniqueHosts.add(document.links[i].hostname);
    }

    function getMostPopular(arr){
        conv_array = [].slice.call(arr)
        return conv_array.sort(function(a,b) {
            return conv_array.filter(v => v===a).length - conv_array.filter(v => v===b).length
        }).pop();
    }

    mostPopularHost = getMostPopular(document.links);
    
    return [linksCount, uniqueHosts, mostPopularHost];
}

function logStats() {
    [imgsCount, maxImgWidth, maxImgHeight, maxImgName] = getImagesStats();
    console.log({ imgsCount, maxImgWidth, maxImgHeight, maxImgName });

    [anchorsCount, anchorsNames, anchorsWithEvenIds, idOfTypedAnchor] = getAnchorsStats();
    console.log({ anchorsCount, anchorsNames, anchorsWithEvenIds, idOfTypedAnchor });

    [linksCount, uniqueHosts, mostPopularHost] = getLinksStats();
    console.log({ linksCount, uniqueHosts, mostPopularHost });
}