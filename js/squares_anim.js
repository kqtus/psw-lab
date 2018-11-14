var numSquares = 0;
var squares = [];

var technologies = ['Redux', 'React', 'Qt', 'C++', 'Flask', 'Flutter', 'Spring', 'ASP.NET', 'NoSQL', 'Kotlin', "Django", "Node.js", "Polymer.js", "Vue.js"]

var max_width_str = '900';
var max_height_str = '500';

var initialized = false;
var num_discover_pressed = 0;

function getRandomTechnologyStr() {
    return technologies[Math.floor(Math.random() * technologies.length)];
}

function createTile(pos, set) {
    numSquares++;

    console.log('creating square on pos ' + pos)
    var square = document.createElement("div");

    tech_str = getRandomTechnologyStr();
    square.textContent = tech_str;

    var color_tint = "square-div ";
    switch (numSquares % 4) {
        case 0:
            color_tint += "col1";
            break;
        case 1:
            color_tint += "col2";
            break;
        case 2:
            color_tint += "col3";
            break;
        case 3:
            color_tint += "col4";
            break;
    }

    square.className = color_tint + set;
    console.log(square.className);
    square.id = "square" + numSquares;
    document.getElementById('tech-div').appendChild(square);
    
    return square;
}

function getRandomPosOnScreen() {
    var x = Math.floor(Math.random() * parseInt(max_width_str));
    var y = Math.floor(Math.random() * parseInt(max_height_str));

    return (x=x, y=y);
}

function init() {
    if (!initialized) {
        window.addEventListener("click", function() {
            update();
        });
    
        document.getElementById("init_btn").addEventListener("click", function() {
            clearTilesDiv();
            createTiles();
        });
        initialized = true;
    }
}

function update() {
    updateTiles();
}

function createTiles() {
    var year = prompt("Please enter year", "2018");
    alert("You will see best technologies to learn in " + year);
    
    var tiles_num = prompt("Please enter number of tiles to see", "");

    var num_squares_to_create = parseInt(tiles_num); //Math.floor(Math.random() * 50) + 50;

    num_discover_pressed++;
    var set = "";

    if (num_discover_pressed % 2 == 0)
        set = "-purple-set";
    else 
        set = "-blue-set";

    console.log(set);
    while (num_squares_to_create > 0) {
        var square = createTile(getRandomPosOnScreen(), set);
        squares.push(square);

        num_squares_to_create--;
    }
}

function clearTilesDiv() {
    document.getElementById('tech-div').innerHTML = "";
}

function updateTiles() {
    var tilesNum = squares.length - 1;
    if (tilesNum == -1)
        return;

    do {
        squares[tilesNum].textContent = getRandomTechnologyStr();
        tilesNum--;
    } while(tilesNum >= 0)
}