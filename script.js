document.addEventListener("DOMContentLoaded", function() {
	var photosWrapper = document.querySelector('.js-photos');
	var photos = document.querySelectorAll('.js-photo');
	var photoWidth = photos[0].offsetWidth; // 500px
  
	var btnDecaleGauche = document.querySelector('.js-btn-decale-gauche');
	var btnDecaleDroite = document.querySelector('.js-btn-decale-droite');
  
	// position slide courante
	var position = 1;
	var minPosition = 0;
	var maxPosition = photos.length - 1;
  
	function decaleGauche() {
	  position++;
  
	  if (position > maxPosition) {
		retourDebut();
		setTimeout(function() {
		  photosWrapper.classList.remove('no-anime'); // on remet la transition animée en place
		  decaleGauche(); // on passe du clone à la slide réellement souhaitée avec l'animation
		}, 20);
	  } else {
		photosWrapper.style.left = position * -photoWidth + "px";
	  }
	}
  
	function decaleDroite() {
	  position--;
  
	  if (position < minPosition) {
		retourFin();
		setTimeout(function() {
		  photosWrapper.classList.remove('no-anime'); // on remet la transition animée en place
		  decaleDroite(); // on passe du clone à la slide réellement souhaitée avec l'animation
		}, 20);
	  } else {
		photosWrapper.style.left = position * -photoWidth + "px";
	  }
	}
  
	function retourDebut() {
	  position = minPosition + 1;
	  photosWrapper.classList.add('no-anime'); // on empèche la transition animée
	  photosWrapper.style.left = position * -photoWidth + "px"; // on saute sur le clone
	}
  
	function retourFin() {
	  position = maxPosition - 1;
	  photosWrapper.classList.add('no-anime'); // on empèche la transition animée
	  photosWrapper.style.left = position * -photoWidth + "px"; // on saute sur le clone
	}
  
	btnDecaleGauche.addEventListener('click', decaleGauche);
	btnDecaleDroite.addEventListener('click', decaleDroite);
  });