function getImagesStats() {
    var imgsCount = document.images.length;
    var maxImgWidth = 0;
    var maxImgHeight = 0;
    var maxImgName = "";

    for (var i = 0; i < document.images.length; i++) {
        var curImg = document.images.values[i];
        var curImgWidth = curImg.width;
        var curImgHeight =curImg.height;

        if (curImgHeight * curImgWidth >= maxImgHeight * maxImgWidth) {
            maxImgHeight = curImgHeight;
            maxImgWidth = curImgWidth;
            maxImgName = curImg.src;
        }
    }

    return (imgsCount, maxImgWidth, maxImgHeight, maxImgName);
}

function getAnchorsStats() {
    var anchorsCount = document.anchors.length;
    var anchorsNames = document.anchors.keys;
    var anchorsWithEvenIds = [];

    for (var i = 0; i < document.anchors.length; i++) {
        if (i % 2 == 0)
            anchorsWithEvenIds.push(document.anchors.item(i));
    }

    var anchorName = prompt("Please type anchor name", "");
    var idOfTypedAnchor = document.anchors.namedItem(anchorName);

    return (anchorsCount, anchorsNames, anchorsWithEvenIds, idOfTypedAnchor);
}

function getLinksStats() {
    var linksCount = document.links.length;
    var uniqueHosts = new Set();
    var mostPopularHost = "";

    document.links.forEach(function (item) {
        uniqueHosts.add(item.hostname);
    });

    function getMostPopular(arr){
        return arr.sort((a,b) =>
              arr.filter(v => v===a).length
            - arr.filter(v => v===b).length
        ).pop();
    }

    mostPopularHost = getMostPopular(document.links);
    
    return (linksCount, uniqueHosts, mostPopularHost);
}