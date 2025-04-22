function startGame() {
    document.getElementById("instructions-screen").style.display = "none";
    document.getElementById("game-container").style.display = "block";
}

const validWords = [
    "PIGEON",
    "GONE", "NOPE", "OPEN", "PINE", "PING", "PONG",
    "EGO", "EON", "GIN", "ION", "NIP", "ONE", "PEG", "PEN", "PIE", "PIG", "PIN"
];

const answerInput = document.getElementById("answer");
const checkBtn = document.getElementById("check-btn");


const result = document.querySelector(".result");
const scoreDisplay = document.querySelector("#score");
const timerDisplay = document.querySelector("#time");

let score = 0;
let usedWords = new Set();
let timeLeft = 120; // seconds

// Elements for guessed and remaining display
const guessedList = document.getElementById("guessed-list");
const remainingCount = document.getElementById("remaining-count");

// Button click listener
checkBtn.addEventListener("click", () => {
    const word = answerInput.value.trim().toUpperCase();

    if (word === "") {
        result.textContent = "❗ Enter a word.";
    } else if (usedWords.has(word)) {
        result.textContent = `⚠️ You've already used "${word}".`;
    } else if (validWords.includes(word)) {
        usedWords.add(word);
        score++;
        scoreDisplay.textContent = score; // Update score in HTML
        guessedList.textContent = [...usedWords].join(", ");
        remainingCount.textContent = validWords.length - usedWords.size;
        result.textContent = `✅ "${word}" is valid!`;
    } else {
        result.textContent = `❌ "${word}" is not a valid word.`;
    }

    answerInput.value = "";
    answerInput.focus();
});

// Timer countdown
const timer = setInterval(() => {
    timeLeft--;
    timerDisplay.textContent = `${timeLeft}s`; // Update timer in HTML

    if (timeLeft <= 0) {
        clearInterval(timer);
        result.textContent = "⏰ Time's up!";
        checkBtn.disabled = true;
        answerInput.disabled = true;

        remainingCount.textContent = validWords.length - usedWords.size;
    }
}, 1000);
