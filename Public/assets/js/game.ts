//   ___ _ _    _
//  / __| (_)__| |_____ _ _
// | (__| | / _| / / -_) '_|
//  \___|_|_\__|_\_\___|_|
//
//-----------------------------------------------------------------------------
// CIS 212
// R.Sondergeld
// 2024-11-25
//-----------------------------------------------------------------------------

console.log('Hello World!');

// Declare variables
enum State
{
    Setup,
    Gameplay,
    Results
}

let setupInterval: NodeJS.Timeout;
let gameInterval: NodeJS.Timeout;
let resultInterval: NodeJS.Timeout;
let clickCount: number = 0;
let setupCountdown = 4;
let gameCountdown: number = 5;
let resultCountdown: number = 2;
let gameState = State.Setup
let clicksPerSecond: number = 0;

// Link to Controls
let button = document.getElementById('game-button') as HTMLButtonElement;
let message = document.getElementById('message');
let clickCountDisplay = document.getElementById('click-count');
let clickCountDiv = document.getElementById('click-count-div');
let highScoreForm = document.getElementById('high-score-form') as HTMLFormElement;
let totalClicksInput = document.getElementById('total_clicks') as HTMLInputElement;
let clicksPerSecondInput = document.getElementById('clicks_per_second') as HTMLInputElement;

// Set Events
button.addEventListener('click', buttonClicked);
//setInterval(loop, 1000 / fps);

// Set elements as hidden or disabled
clickCountDiv.hidden = true;
button.classList.remove('btn-primary');
button.classList.add('btn-secondary');
button.disabled = true;
button.innerText = ". . . ";

//gameSetUp();
message.textContent = 'Get Ready!';
setupInterval = setInterval(setup, 1000);

//-----------------------------------------------------------------------------
function buttonClicked()
{
    if(gameState == State.Gameplay)
    {
        // Increment the click count
        clickCount = clickCount + 1;

        // Update the display
        clickCountDisplay.textContent = 'total clicks : ' + String(clickCount);
    }
}
//-----------------------------------------------------------------------------
function setup()
{
    // Count down
    setupCountdown = setupCountdown = setupCountdown - 1;

    // Check if our countdown is complete
    if(setupCountdown > 0)
    {
        // If not, Update the message
        message.textContent = String(setupCountdown);

    }
    else
    {
        // Set the next state
        gameState = State.Gameplay;

        // Set the message
        message.textContent = 'Click away!';

        // Set the button text
        button.textContent = "Click Me!";

        // Set the count visible
        clickCountDiv.hidden = false;

        // set the button to work
        button.disabled = false;
        button.classList.remove('btn-secondary');
        button.classList.add('btn-primary');

        // Clear our interval
        clearInterval(setupInterval);

        // Set the game interval for 1 second countdown
        gameInterval = setInterval(game, 1000);
    }
}
//-----------------------------------------------------------------------------
function game()
{
    gameCountdown = gameCountdown - 1

    if(gameCountdown > -1)
    {
        let c = String(gameCountdown);
        message.textContent = 'Keep going! only ' + c + ' more seconds left!';
    }
    else
    {
        // game is over, set result state
        gameState = State.Results;

        // Clear this interval
        clearInterval(gameInterval);

        // Show the results
        showResults();

        // Set the result countdown
        resultInterval = setInterval(showResultsCountdown, 1000);

    }
}
//-----------------------------------------------------------------------------
function showResults()
{
    // calculate the clicks per second
    clicksPerSecond = clickCount / 5;

    // String versions
    let cps = String(clicksPerSecond);

    // Display the information
    message.textContent = 'You clicked at a rate of ' + cps +
        ' clicks per second!';

    // set the new game button
    button.hidden = true;

    // let's set some form data
    clicksPerSecondInput.value = String(clicksPerSecond);
    totalClicksInput.value = String(clickCount);

}
//-----------------------------------------------------------------------------
function showResultsCountdown()
{
    // Decrement our counter
    resultCountdown = resultCountdown - 1;

    if(resultCountdown < 0)
    {
        // Clear this interval
        clearInterval(resultInterval);

        // submit the form to log our data into the scores table
        highScoreForm.submit();
    }

}
//-----------------------------------------------------------------------------

