var numSquares = 0;
var squares = [];

var technologies = ['Redux', 'React', 'Qt', 'C++', 'Flask', 'Flutter', 'Spring', 'ASP.NET', 'NoSQL', 'Kotlin']

var max_width_str = '900';
var max_height_str = '500';

var squares_once_created = false;

function getRandomTechnologyStr() {
    return technologies[Math.floor(Math.random() * technologies.length)];
}

function createTile(pos) {
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

    square.className = color_tint;
    square.id = "square" + numSquares;
    document.getElementsByClassName('tech-div')[0].appendChild(square);
    
    return square;
}

function getRandomPosOnScreen() {
    var x = Math.floor(Math.random() * parseInt(max_width_str));
    var y = Math.floor(Math.random() * parseInt(max_height_str));

    return (x=x, y=y);
}

function init() {
    var person = prompt("Please enter your name", "Harry Potter");
    alert("You will be adding " + person);
    createTiles();
}

function update() {
    updateTiles();
}

function createTiles() {
    squares_once_created = true;
    var num_squares_to_create = 5; //Math.floor(Math.random() * 50) + 50;

    while (num_squares_to_create > 0) {
        var square = createTile(getRandomPosOnScreen());
        squares.push(square);

        num_squares_to_create--;
    }
}

function updateTiles() {
    if (squares_once_created == true) {
        var tilesNum = squares.length - 1;
        do {
            squares[tilesNum].textContent = getRandomTechnologyStr();
            tilesNum--;
        } while(tilesNum >= 0)
    }
}