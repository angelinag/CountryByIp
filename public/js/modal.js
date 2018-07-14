class BaseModal {
  constructor( parent, text, buttons, id = '' )
  {
  	if ( new.target === BaseModal ) {
      throw new TypeError( 'This is an abstract class' );
    }
    this.createModalElement( parent, text, buttons, id );
  }
  
  // creates the DOM element for the dialog and buttons
  // and attaches event listeners
  createModalElement ( parent, text, buttons, id )
  {
  	// creates the element and adds the text to it
  	let modal = document.createElement( 'div' );
    modal.setAttribute( 'id', id );
    modal.classList.add( 'modal' );
  	modal.innerHTML = text;
    
    // attaches buttons and event listeners
    buttons.forEach( function( buttonText )
    {
    	let button = document.createElement( 'span' );
			button.appendChild( document.createTextNode( buttonText ) );
      button.classList.add( 'modal-button' );
      button.addEventListener( 'click', function() {
    		this.onModalButtonClick( buttonText, id );
    	}.bind( this ) );
    	modal.appendChild( button );
    }.bind( this ) );
    
    // adds modal to the parent
    parent.appendChild( modal );
    this.modal = modal;
  }
  
  // handles dialog button clicks
  onModalButtonClick( btnText, id )
  {
  	this.onModalButtonClickAction( btnText, id );
  	BaseModal.hideElement( this.modal );
  }
  
  // the function that you should redefine (override) when
  // making child classes of the BaseModal class.
  // here should lie a call to function that handles the dialog
  // user response logic
  onModalButtonClickAction( btnText, id )
  {
  	alert( 'User just clicked ' + btnText + ' on modal id= "' + id + '" and you can do something about it if you wish' );
  }
  
  // if you want to hide a modal element in general
  static hideElement( modal )
  {
    modal.classList.add( 'modal-hidden' );
  }
  
  // gets DOM modal element by instance
  getElement()
  {
  	return this.modal;
  }
}

// extending the BaseModal class with what we need
class Modal extends BaseModal {
	// You should override onModalButtonClickAction() here
}