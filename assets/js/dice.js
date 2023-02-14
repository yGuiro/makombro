console.clear();

/**
 * Set up custom dice-roll element
 *
 **/

const getRandomInt = (min, max) =>
  Math.floor(Math.random() * (max - min + 1)) + min;

const rollDie = (max, numEl, perc) => {
  const newVal = getRandomInt(1, max);
  numEl.textContent = newVal + (perc ? "%" : "");
};

const animateDie = (max, numEl, perc) => {
  for (let i = 0; i < 10; i++) {
    setTimeout(() => {
      requestAnimationFrame(() => rollDie(max, numEl, perc));
    }, i * 20);
  }
};

class DiceRoll extends HTMLElement {
  constructor() {
    super();
    const shadow = this.attachShadow({ mode: "open" });

    shadow.innerHTML = `
      <div class="die">
        <span class="die-num"></span>
        <span class="die-label">
          d${this.attributes.sides.value}
        </span>
      </div>

      <style>
        .die {
          align-items: center;
          border: 1px solid #333;
          cursor: pointer;
          display: flex;
          justify-content: center;
          position: relative;
          width: 100px;
          height: 100px;
        }

        .die-num {
          color: white;
          font-family: serif;
          font-size: 28px;
        }

        .die-label {
          background-color: #333;
          bottom: 0;
          color: #999;
          font-size: 14px;
          padding: 3px;
          position: absolute;
          right: 0;
        }
      </style>
    `;
    this.numEl = shadow.querySelector(".die-num");
    this.addEventListener("click", this.roll);
    this.roll();
  }

  roll = (e) => {
    if (e) e.preventDefault();
    animateDie(
      this.getAttribute("sides"),
      this.numEl,
      this.hasAttribute("percent")
    );
  };
}

window.customElements.define("dice-roll", DiceRoll);

/**
 *
 * Set up 'roll all' behaviour with sound
 *
 **/

const dieRollSound = document.querySelector("#die-sound");

const rollAll = () => {
  const dice = document.querySelectorAll("dice-roll");
  for (let i = 0; i < dice.length; i++) {
    dice[i].roll();
  }
  dieRollSound.play();
};

document.querySelector(".roll-all").addEventListener("click", rollAll);

/**
 *
 * Set up motion shake using accelerometer to roll all
 *
 **/

const last = {
  x: null,
  y: null,
  z: null,
  ts: 0,
  count: 0,
};
const THRES = 15;
const MAX_COUNT = 5;
const REFRESH_RATE = 100;

const handleMotion = (e) => {
  const m = e.accelerationIncludingGravity;
  if (last.x === null && last.y === null && last.z === null) {
    last.x = m.x;
    last.y = m.y;
    last.z = m.z;
    return;
  }

  const dx = Math.abs(last.x - m.x);
  const dy = Math.abs(last.y - m.y);
  const dz = Math.abs(last.z - m.z);

  if (
    (dx > THRES && dy > THRES) ||
    (dx > THRES && dz > THRES) ||
    (dy > THRES && dz > THRES)
  ) {
    const ct = Date.now();
    const diff = ct - last.ts;

    if (diff > REFRESH_RATE) {
      last.count++;
      if (last.count === MAX_COUNT) {
        rollAll();
        last.count = 0;
      }
      last.ts = ct;
    }
  }

  last.x = m.x;
  last.y = m.y;
  last.z = m.z;
};

window.addEventListener("devicemotion", handleMotion, true);
