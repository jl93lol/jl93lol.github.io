"use strict";

// All songs courtesy of Archive.org community audio:
// https://archive.org/details/audio

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var PI = Math.PI,
    cos = Math.cos,
    sin = Math.sin,
    abs = Math.abs,
    sqrt = Math.sqrt,
    pow = Math.pow,
    floor = Math.floor,
    round = Math.round;

var HALF_PI = 0.5 * PI;
var TAU = 2 * PI;
var rand = function rand(n) {
	return n * Math.random();
};
var randRange = function randRange(n) {
	return n - rand(2 * n);
};
var fadeInOut = function fadeInOut(t, m) {
	return abs((t + 0.5 * m) % m - 0.5 * m) / (0.5 * m);
};

var VectorArrayObject = function () {
	function VectorArrayObject() {
		var count = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
		var max = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

		_classCallCheck(this, VectorArrayObject);

		this.count = count || max;
		this.max = max || count;
		this.values = new Float32Array(max * 2);
	}

	_createClass(VectorArrayObject, [{
		key: "get",
		value: function get(i) {
			return {
				x: this.values[i * 2],
				y: this.values[i * 2 + 1]
			};
		}
	}, {
		key: "getX",
		value: function getX(i) {
			return this.values[i * 2];
		}
	}, {
		key: "getY",
		value: function getY(i) {
			return this.values[i * 2 + 1];
		}
	}, {
		key: "set",
		value: function set(i, x, y) {
			this.values[i * 2] = x;
			this.values[i * 2 + 1] = y;
			return this;
		}
	}, {
		key: "setX",
		value: function setX(i, x) {
			this.values[i * 2] = x;
			return this;
		}
	}, {
		key: "setY",
		value: function setY(i, y) {
			this.values[i * 2 + 1] = y;
			return this;
		}
	}]);

	return VectorArrayObject;
}();

var VectorArrayObjectController = function () {
	function VectorArrayObjectController() {
		var count = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
		var max = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

		_classCallCheck(this, VectorArrayObjectController);

		this.count = count || max;
		this.max = max || count;
		this.life = new VectorArrayObject(this.count, this.max);
		this.vertices = new VectorArrayObject(this.count, this.max);
		this.velocities = new VectorArrayObject(this.count, this.max);
	}

	_createClass(VectorArrayObjectController, [{
		key: "getLife",
		value: function getLife(i) {
			return this.life.getX(i);
		}
	}, {
		key: "getTTL",
		value: function getTTL(i) {
			return this.life.getY(i);
		}
	}, {
		key: "setLife",
		value: function setLife(i, life) {
			this.life.setX(i, life);
			return this;
		}
	}, {
		key: "setTTL",
		value: function setTTL(i, ttl) {
			this.life.setY(i, ttl);
			return this;
		}
	}, {
		key: "getVertex",
		value: function getVertex(i) {
			return this.vertices.get(i);
		}
	}, {
		key: "setVertex",
		value: function setVertex(i, x, y) {
			this.vertices.set(i, x, y);
			return this;
		}
	}, {
		key: "getVelocity",
		value: function getVelocity(i) {
			return this.velocities.get(i);
		}
	}, {
		key: "setVelocity",
		value: function setVelocity(i, x, y) {
			this.velocities.set(i, x, y);
			return this;
		}
	}]);

	return VectorArrayObjectController;
}();

var RenderObject = function () {
	function RenderObject() {
		var x = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
		var y = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

		_classCallCheck(this, RenderObject);

		this.life = 0;
		this.position = new Vector2(x, y);
		this.lastPosition = this.position.clone();
		this.velocity = new Vector2();
	}

	_createClass(RenderObject, [{
		key: "getPosition",
		value: function getPosition() {
			return this.position.clone();
		}
	}, {
		key: "setPosition",
		value: function setPosition(x, y) {
			this.position.x = x;
			this.position.y = y;
			return this;
		}
	}, {
		key: "setLastPosition",
		value: function setLastPosition() {
			this.lastPosition.x = this.position.x;
			this.lastPosition.y = this.position.y;
			return this;
		}
	}, {
		key: "getVelocity",
		value: function getVelocity() {
			return this.velocity.clone();
		}
	}, {
		key: "setVelocity",
		value: function setVelocity(x, y) {
			this.velocity.x = x;
			this.velocity.y = y;
			return this;
		}
	}, {
		key: "getLife",
		value: function getLife() {
			return this.life;
		}
	}, {
		key: "setLife",
		value: function setLife(n) {
			this.life = n;
			return this;
		}
	}, {
		key: "setTTL",
		value: function setTTL(n) {
			this.ttl = n;
			return this;
		}
	}]);

	return RenderObject;
}();

var Particle = function (_RenderObject) {
	_inherits(Particle, _RenderObject);

	function Particle(x, y, bounds, controller) {
		_classCallCheck(this, Particle);

		var _this = _possibleConstructorReturn(this, (Particle.__proto__ || Object.getPrototypeOf(Particle)).call(this, x, y, bounds));

		_this.parent = controller;
		_this.reset = false;
		_this.bounds = bounds;
		_this.alpha = 0;
		_this.hue = 0;
		_this.frequency = 0;
		_this.size = 0;
		return _this;
	}

	_createClass(Particle, [{
		key: "update",
		value: function update(vX, vY) {
			this.life++;
			this.setVelocity(vX, vY).setLastPosition().checkLife().checkBounds();

			this.setSize().setHue().setAlpha().setColor();

			this.velocity.multiplyScalar(pow(this.normalizedFrequency * 0.3, 2) + 1);

			this.position.add(this.velocity);

			return this;
		}
	}, {
		key: "setIndex",
		value: function setIndex(i) {
			this.index = i;
			return this;
		}
	}, {
		key: "checkLife",
		value: function checkLife() {
			if (this.life >= this.ttl) this.reset = true;
			return this;
		}
	}, {
		key: "checkBounds",
		value: function checkBounds() {
			if (this.position.x > this.bounds.x + this.size || this.position.x < -this.size || this.position.y > this.bounds.y + this.size || this.position.y < -this.size) {
				this.reset = true;
			}
			return this;
		}
	}, {
		key: "setSize",
		value: function setSize() {
			this.size = pow(this.normalizedFrequency * 3.75, 3) + 2;
			return this;
		}
	}, {
		key: "setFrequency",
		value: function setFrequency(n) {
			this.frequency = n;
			this.normalizedFrequency = n / 256;
			return this;
		}
	}, {
		key: "setHue",
		value: function setHue() {
			this.hue = this.index / this.parent.count * 90 - this.frequency + this.parent.delta;
			return this;
		}
	}, {
		key: "setAlpha",
		value: function setAlpha() {
			this.alpha = fadeInOut(this.life, this.ttl) * this.normalizedFrequency;
			return this;
		}
	}, {
		key: "setColor",
		value: function setColor() {
			this.color = "hsla(" + this.hue + ", 75%, 50%, " + this.alpha + ")";
			return this;
		}
	}, {
		key: "draw",
		value: function draw(canvas) {
			canvas.buffer.save();
			canvas.arc(this.position.x, this.position.y, this.size, 0, TAU, this.color);
			canvas.buffer.restore();
			return this;
		}
	}]);

	return Particle;
}(RenderObject);

var ParticleController = function (_VectorArrayObjectCon) {
	_inherits(ParticleController, _VectorArrayObjectCon);

	function ParticleController(count, max, canvas) {
		_classCallCheck(this, ParticleController);

		var _this2 = _possibleConstructorReturn(this, (ParticleController.__proto__ || Object.getPrototypeOf(ParticleController)).call(this, count, count));

		_this2.delta = 0;
		_this2.canvas = canvas;
		_this2.bounds = canvas.dimensions;
		_this2.populate();
		return _this2;
	}

	_createClass(ParticleController, [{
		key: "populate",
		value: function populate() {
			this.renderTarget = new Particle(0, 0, this.bounds, this);
			for (var i = 0; i < this.count; i++) {
				this.initRenderTarget(i);
			}
		}
	}, {
		key: "initRenderTarget",
		value: function initRenderTarget(i) {
			var x = void 0,
			    y = void 0,
			    theta = void 0,
			    vX = void 0,
			    vY = void 0,
			    ttl = void 0;

			x = rand(this.bounds.x);
			y = rand(this.bounds.y);

			this.renderTarget.setLife(0).setPosition(x, y).setLastPosition();

			theta = this.canvas.origin.angleTo(this.renderTarget.position);
			vX = cos(theta);
			vY = sin(theta);
			ttl = rand(50) + 100;

			this.renderTarget.setVelocity(vX, vY);

			this.setVertex(i, x, y).setLife(i, 0).setTTL(i, ttl).setVelocity(i, vX, vY);

			this.renderTarget.reset = false;

			return this;
		}
	}, {
		key: "drawRenderTarget",
		value: function drawRenderTarget(i, freqData) {
			this.renderTarget.setIndex(i).setLife(this.getLife(i)).setTTL(this.getTTL(i)).setPosition(this.vertices.getX(i), this.vertices.getY(i)).setFrequency(freqData).update(this.velocities.getX(i), this.velocities.getY(i)).draw(this.canvas);

			this.setVertex(i, this.renderTarget.position.x, this.renderTarget.position.y).setVelocity(i, this.renderTarget.velocity.x, this.renderTarget.velocity.y).setLife(i, this.renderTarget.getLife());

			if (this.renderTarget.reset) {
				this.initRenderTarget(i);
			}
		}
	}]);

	return ParticleController;
}(VectorArrayObjectController);

var AudioController = function () {
	function AudioController() {
		_classCallCheck(this, AudioController);

		this.playing = false;
		this.initAudio();
		this.btnInitialize = document.querySelector("#btn-initialize");
		this.btnInitialize.addEventListener("click", this.initialize.bind(this));
	}

	_createClass(AudioController, [{
		key: "initialize",
		value: function initialize() {
			var _this3 = this;

			this.element.addEventListener("timeupdate", function () {
				_this3.progressBar.style = "transform: scaleX(" + _this3.element.currentTime / _this3.element.duration + ")";
			});
			this.element.addEventListener("ended", function () {
				_this3.element.currentTime = 0;
				_this3.element.pause();
				_this3.currentTrack = _this3.currentTrack < _this3.fileNames.length - 1 ? _this3.currentTrack + 1 : 1;
				_this3.load();
			});
			this.initUI();
			this.ctx.resume();
			this.load();
		}
	}, {
		key: "initAudio",
		value: function initAudio() {
			this.baseURL = "https://jimmyleunghk.github.io/files/";
			this.currentFile = {};
			this.files = {};
			this.fileNames = ["Alto's Odyssey Zen Mode.mp3", "Alto's Adventure Zen Mode.mp3", "Over the Horizon by Pétur Jónsson.mp3", "BrunuhVille - Spirit of the Wild.mp3"];
			this.trackTitles = ["Alto's Odyssey Zen Mode", "Alto's Adventure Zen Mode", "Over the Horizon by Pétur Jónsson", "BrunuhVille - Spirit of the Wild"];
			this.currentTrack = floor(rand(this.fileNames.length));

			this.element = document.createElement("audio");
			document.body.appendChild(this.element);
			this.ctx = new AudioContext();
			this.source = this.ctx.createMediaElementSource(this.element);

			this.gainNode = this.ctx.createGain();

			this.analyser = this.ctx.createAnalyser();
			this.analyser.smoothingTimeConstant = 0.88;
			this.analyser.minDecibels = -130;
			this.analyser.maxDecibels = -10;
			this.analyser.fftSize = 1024;

			this.source.connect(this.gainNode);
			this.gainNode.connect(this.analyser);
			this.analyser.connect(this.ctx.destination);

			this.gainNode.gain.value = 0.8;
			this.freqData = new Uint8Array(this.analyser.frequencyBinCount);
		}
	}, {
		key: "initUI",
		value: function initUI() {
			var _this4 = this;

			this.btnInitialize.classList.add("disabled");
			this.controls = {
				menu: {
					toggle: document.querySelector("#lbl-menu-toggle"),
					checkbox: document.querySelector("#chk-menu-toggle")
				},
				parent: document.querySelector("#audio-controls"),
				play: document.querySelector("#btn-play"),
				next: document.querySelector("#btn-next"),
				prev: document.querySelector("#btn-prev"),
				seekBar: document.querySelector("#seek-bar"),
				volume: {
					icon: document.querySelector("#icon-volume"),
					element: document.querySelector("#rng-volume")
				},
				trackList: {
					parent: document.querySelector("#track-list"),
					input: document.querySelector("#in-add-track"),
					titleForm: document.querySelector("#frm-track-title"),
					options: []
				}
			};

			this.progressBar = document.querySelector("#progress-bar");

			this.titleLabel = document.querySelector("#title");
			this.loader = document.querySelector("#loader");
			this.controls.menu.toggle.classList.remove("hidden");
			this.controls.parent.classList.remove("hidden");
			this.controls.play.addEventListener("click", this.playPause.bind(this));
			this.controls.next.addEventListener("click", this.changeTrack.bind(this));
			this.controls.prev.addEventListener("click", this.changeTrack.bind(this));
			this.controls.volume.element.addEventListener("input", this.changeVolume.bind(this));
			this.controls.seekBar.addEventListener("click", this.changeTime.bind(this));
			this.controls.trackList.input.addEventListener("change", function (e) {
				var name = e.target.files[0].name;

				if (_this4.validFile(name)) {
					_this4.controls.trackList.titleForm.classList.remove("hidden");
					_this4.controls.trackList.titleForm.title.value = name;
				} else {
					alert("The file you chose is not a audio file. Please try again.");
				}
			});
			this.controls.trackList.titleForm.addEventListener("submit", function (e) {
				e.preventDefault();
				_this4.controls.trackList.titleForm.classList.add("hidden");
				_this4.uploadFile(String(e.target.title.value), _this4.controls.trackList.input.files[0]);
			});
			for (var i = 0; i < this.trackTitles.length; i++) {
				this.addTrackOption(i, this.trackTitles[i]);
			}
		}
	}, {
		key: "changeTime",
		value: function changeTime(e) {
			this.element.currentTime = this.element.duration * (e.clientX / e.target.offsetWidth);
		}
	}, {
		key: "changeVolume",
		value: function changeVolume(e) {
			var value = e.target.value;

			this.gainNode.gain.value = value;
			this.controls.volume.icon.className = "fa";
			this.controls.volume.icon.classList.add(value > 0.5 ? "fa-volume-up" : value > 0 ? "fa-volume-down" : "fa-volume-off");
		}
	}, {
		key: "addTrackOption",
		value: function addTrackOption(i, title) {
			var _this5 = this;

			var el = document.createElement("li");
			el.className = "track-option";
			el.setAttribute("data-track", i);
			el.innerHTML = i + 1 + ". " + title;
			el.addEventListener("click", function (e) {
				_this5.currentTrack = parseInt(e.target.getAttribute("data-track"));
				_this5.closeMenu();
				_this5.load();
			});
			this.controls.trackList.parent.appendChild(el);
		}
	}, {
		key: "validFile",
		value: function validFile(fileName) {
			return (/(\.mp3|\.mp4|\.wav|\.flac|\.ogg)/gi.test(fileName)
			);
		}
	}, {
		key: "uploadFile",
		value: function uploadFile(title, data) {
			this.files[data.name] = this.currentFile = {
				title: title,
				data: data
			};
			this.fileNames.push(data.name);
			this.trackTitles.push(title);
			this.currentTrack = this.fileNames.length - 1;
			this.addTrackOption(this.fileNames.length - 1, title);
			this.closeMenu();
			this.play();
		}
	}, {
		key: "closeMenu",
		value: function closeMenu() {
			this.controls.menu.checkbox.checked = false;
		}
	}, {
		key: "changeTrack",
		value: function changeTrack(e) {
			var value = parseInt(e.target.getAttribute("data-value"));
			this.currentTrack += value;
			if (this.currentTrack < 0) this.currentTrack = this.fileNames.length - 1;
			if (this.currentTrack > this.fileNames.length - 1) this.currentTrack = 0;
			this.load();
		}
	}, {
		key: "playPause",
		value: function playPause() {
			if (this.playing) {
				this.controls.play.classList.remove("fa-pause");
				this.controls.play.classList.add("fa-play");
				this.playing = false;
				this.element.pause();
			} else {
				this.controls.play.classList.remove("fa-play");
				this.controls.play.classList.add("fa-pause");
				this.playing = true;
				this.element.play();
			}
		}
	}, {
		key: "load",
		value: function load() {
			var _this6 = this;

			this.controls.parent.classList.add("disabled");
			this.loader.classList.remove("hidden");
			this.loader.classList.add("loading");
			if (this.files[this.fileNames[this.currentTrack]]) {
				this.currentFile = this.files[this.fileNames[this.currentTrack]];
				this.play();
			} else {
				var request = new XMLHttpRequest();

				request.open("GET", this.baseURL + this.fileNames[this.currentTrack], true);
				request.responseType = "blob";
				request.onload = function () {
					_this6.files[_this6.fileNames[_this6.currentTrack]] = _this6.currentFile = {
						title: _this6.trackTitles[_this6.currentTrack],
						data: request.response
					};
					_this6.play();
				};
				request.send();
			}
		}
	}, {
		key: "play",
		value: function play() {
			this.controls.parent.classList.remove("disabled");
			this.titleLabel.innerHTML = this.currentFile.title;
			this.loader.classList.remove("loading");
			this.loader.classList.add("hidden");
			this.audioReady = true;
			this.playing = true;
			this.element.src = window.URL.createObjectURL(this.currentFile.data);
			this.element.play();
		}
	}, {
		key: "getFrequencyData",
		value: function getFrequencyData() {
			this.analyser.getByteFrequencyData(this.freqData);
			return this.freqData;
		}
	}]);

	return AudioController;
}();

var Canvas = function () {
	function Canvas(selector) {
		_classCallCheck(this, Canvas);

		this.element = document.querySelector(selector) || function () {
			var element = document.createElement("canvas");
			element.style = "position: absolute; top: 0; left: 0; z-index: 0; width: 100vw; height: calc(100vh - 65px);";
			document.body.appendChild(element);
			return element;
		}();
		this.ctx = this.element.getContext("2d");
		this.frame = document.createElement("canvas");
		this.buffer = this.frame.getContext("2d");
		this.dimensions = new Vector2();
		this.origin = new Vector2();
		window.addEventListener("resize", this.resize.bind(this));
		this.resize();
	}

	_createClass(Canvas, [{
		key: "resize",
		value: function resize() {
			this.dimensions.x = this.frame.width = this.element.width = window.innerWidth;
			this.dimensions.y = this.frame.height = this.element.height = window.innerHeight;
			this.origin.x = 0.5 * this.dimensions.x;
			this.origin.y = this.dimensions.y;
		}
	}, {
		key: "clear",
		value: function clear() {
			this.ctx.clearRect(0, 0, this.dimensions.x, this.dimensions.y);
			this.buffer.clearRect(0, 0, this.dimensions.x, this.dimensions.y);
		}
	}, {
		key: "line",
		value: function line(x1, y1, x2, y2, w, c) {
			this.buffer.beginPath();
			this.buffer.strokeStyle = c;
			this.buffer.lineWidth = w;
			this.buffer.moveTo(x1, y1);
			this.buffer.lineTo(x2, y2);
			this.buffer.stroke();
			this.buffer.closePath();
		}
	}, {
		key: "fill",
		value: function fill(c) {
			this.buffer.fillStyle = c;
			this.buffer.fillRect(0, 0, this.dimensions.x, this.dimensions.y);
		}
	}, {
		key: "rect",
		value: function rect(x, y, w, h, c) {
			this.buffer.fillStyle = c;
			this.buffer.fillRect(x, y, w, h);
		}
	}, {
		key: "arc",
		value: function arc(x, y, r, s, e, c) {
			this.buffer.beginPath();
			this.buffer.fillStyle = c;
			this.buffer.arc(x, y, r, s, e);
			this.buffer.fill();
			this.buffer.closePath();
		}
	}, {
		key: "render",
		value: function render() {
			this.ctx.drawImage(this.frame, 0, 0);
		}
	}, {
		key: "drawImage",
		value: function drawImage(image) {
			var x = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
			var y = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;

			this.buffer.drawImage(image, x, y);
		}
	}]);

	return Canvas;
}();

var MPApp = function () {
	function MPApp() {
		_classCallCheck(this, MPApp);

		this.canvas = new Canvas();
		this.audio = new AudioController();
		this.particles = new ParticleController(this.audio.analyser.frequencyBinCount, this.audio.analyser.frequencyBinCount, this.canvas);
		this.initUI();
		this.update();
	}

	_createClass(MPApp, [{
		key: "initUI",
		value: function initUI() {
			var _this7 = this;

			this.controls = {
				particles: document.querySelector("#chk-particles"),
				backlight: document.querySelector("#chk-backlight"),
				spectrum: document.querySelector("#chk-spectrum"),
				glow: document.querySelector("#chk-glow")
			};
			this.drawParticles = this.controls.particles.checked;
			this.controls.particles.addEventListener("click", function (e) {
				return _this7.drawParticles = e.target.checked;
			});
			this.backlight = this.controls.backlight.checked;
			this.controls.backlight.addEventListener("click", function (e) {
				return _this7.backlight = e.target.checked;
			});
			this.spectrum = this.controls.spectrum.checked;
			this.controls.spectrum.addEventListener("click", function (e) {
				return _this7.spectrum = e.target.checked;
			});
			this.glow = this.controls.glow.checked;
			this.controls.glow.addEventListener("click", function (e) {
				return _this7.glow = e.target.checked;
			});
		}
	}, {
		key: "draw",
		value: function draw(freqData) {
			var x = void 0,
			    y = void 0,
			    norm = void 0,
			    hue = void 0,
			    scale = void 0,
			    data = void 0;

			this.particles.delta += 0.15;
			this.canvas.clear();
			this.canvas.buffer.globalCompositeOperation = "lighter";
			for (var i = 0; i < this.particles.count; i++) {
				data = freqData[i];
				if (this.drawParticles) {
					this.particles.drawRenderTarget(i, data);
				}
				if (this.spectrum && !(i % 2)) {
					x = i / freqData.length * this.canvas.origin.x;
					y = this.canvas.dimensions.y;
					norm = data / 256;
					hue = 90 * (1 - norm);
					scale = norm * (0.25 * this.canvas.dimensions.y);

					this.canvas.line(this.canvas.origin.x + x + 1, y, this.canvas.origin.x + x + 1, y - scale, 1, "hsla(" + hue + ", 75%, 50%, 1)");
					this.canvas.line(this.canvas.origin.x - x - 1, y, this.canvas.origin.x - x - 1, y - scale, 1, "hsla(" + hue + ", 75%, 50%, 1)");
				}
			}
			if (this.glow) {
				this.drawGlowLayer();
			}
			if (this.backlight) {
				this.drawBacklight(freqData);
			}
			this.canvas.render();
		}
	}, {
		key: "drawBacklight",
		value: function drawBacklight(freqData) {
			var avg = void 0,
			    hue = void 0,
			    gradient = void 0;
			avg = freqData.reduce(function (a, b) {
				return a + b + 1;
			}) / freqData.length;
			hue = 128 - avg;
			gradient = this.canvas.buffer.createRadialGradient(this.canvas.origin.x, this.canvas.origin.y, 0, this.canvas.origin.x, this.canvas.origin.y, 0.5 * this.canvas.dimensions.x);
			gradient.addColorStop(0, "hsla(" + hue + ", 75%, 70%, " + pow(avg / 128, 2) + ")");
			gradient.addColorStop(1, "hsla(" + hue + ", 75%, 40%, 0)");
			this.canvas.rect(0, 0, this.canvas.dimensions.x, this.canvas.dimensions.y, gradient);
		}
	}, {
		key: "drawGlowLayer",
		value: function drawGlowLayer() {
			this.canvas.buffer.save();
			this.canvas.buffer.filter = "blur(8px)";
			this.canvas.buffer.drawImage(this.canvas.frame, 0, 0);
			this.canvas.buffer.restore();
		}
	}, {
		key: "update",
		value: function update() {
			this.draw(this.audio.getFrequencyData());
			window.requestAnimationFrame(this.update.bind(this));
		}
	}]);

	return MPApp;
}();

window.addEventListener("load", function () {
	var app = new MPApp();
});