function ready () {
	'use strict'

	// ! Menu
	const menuContainer = document.querySelector( '.site-header' )
	const siteNav = document.getElementById( 'site-navigation' )
	const mobileMenuButton = document.getElementById( 'mobile-menu' )

	// ! Menu - toggle mobile menu.
	mobileMenuButton.addEventListener( 'click', function (e) {
		e.preventDefault()

		if ( menuContainer.classList.contains( 'mobile-menu-open' ) ) {
			// If open, close menu
			menuContainer.classList.remove( 'arrow-up' )
			menuContainer.classList.add( 'fade-out' )
			menuContainer.classList.remove( 'mobile-menu-open' )
			mobileMenuButton.setAttribute( 'aria-expanded', false )
			setTimeout(function () {
				menuContainer.classList.remove( 'fade-out' )
			}, 500)
		} else {
			// If closed, open menu
			menuContainer.classList.add( 'arrow-up' )
			menuContainer.classList.add( 'fade-in' )
			mobileMenuButton.setAttribute( 'aria-expanded', true )
			setTimeout(function () {
				menuContainer.classList.add( 'mobile-menu-open' )
				menuContainer.classList.remove( 'fade-in' )
			}, 500)
		}
	})

	// ! Menu - drop-down menu.
	const menuHasChildrenItems = document.querySelectorAll('.site-header #primary-menu .menu-item-has-children')
	const menuHasChildrenBtn = document.querySelectorAll('.site-header #primary-menu .menu-item-has-children > .toggle-dropdown')
	for ( let menuChildren of menuHasChildrenBtn ) {
		// get parent nodes.
		const menuParent = menuChildren.parentNode

		// Set ID and aria-labelledby for each button and drop-down
		const anchorLabel = menuChildren.textContent
		const anchorLabelStr = anchorLabel.replace(/\s+/g, '-').toLowerCase()
		menuParent.querySelector('button').setAttribute( 'id', anchorLabelStr )
		menuParent.querySelector('.sub-menu').setAttribute( 'aria-labelledby', anchorLabelStr )

		// toggle drop-down
		menuChildren.addEventListener( 'click', function (e) {
			e.preventDefault()

			if ( menuParent.classList.contains( 'menu-open' ) ) {
				// If open, close drop-down menu.
				menuParent.classList.remove( 'menu-open' )
				menuChildren.setAttribute( 'aria-expanded', false )
			} else {
				// First remove all instances of .menu-open from .menu-item-has-children
				for ( let menuHasChildrenItem of menuHasChildrenItems ) {
					menuHasChildrenItem.classList.remove('menu-open')

					// Then set all toggle-dropdown buttons to aria-expanded false.
					const toggleDropdowns = menuHasChildrenItem.querySelectorAll('.toggle-dropdown')
					for (let toggleDropdown of toggleDropdowns) {
						toggleDropdown.setAttribute( 'aria-expanded', false )
					}
				}
				// If closed, open drop-down menu.
				menuChildren.setAttribute( 'aria-expanded', true )
				setTimeout( function () {
					menuParent.classList.add( 'menu-open' )
				}, 100 )
			}
		})
	}

	// ! Menu - hide drop-down menu on outside click
	document.addEventListener( 'mouseup', function (e) {
		for ( let menuChildren of menuHasChildrenBtn ) {
			// get parent node.
			const menuParent = menuChildren.parentNode

			if ( menuParent.classList.contains( 'menu-open' ) && e.target.closest( '#site-navigation' ) === null ) {
				menuParent.classList.remove( 'menu-open' )
				menuChildren.setAttribute('aria-expanded', false)
			}
		}
	})

	// ! Menu - hide drop-down using ESC key.
	document.addEventListener('keyup', function (e) {
        const key = e.key
		for ( let menuChildren of menuHasChildrenBtn ) {
			// get parent node.
			const menuParent = menuChildren.parentNode

			if ( menuParent.classList.contains( 'menu-open' ) && key === 'Escape' ) {
				menuParent.classList.remove( 'menu-open' )
				menuChildren.setAttribute( 'aria-expanded', false )
				menuParent.querySelector('button').focus()
			}
		}
    })
	// end menu

	// ! Search modal
	// Click to open search modal.
	const menuItemSearch = document.querySelectorAll('.site-header #primary-menu .menu-item.search button')
	const searchModal = document.getElementById('search-modal')
	for ( let menuSearch of menuItemSearch ) {

		// ! Search - toggle modal drop-down.
		menuSearch.addEventListener( 'click', function (e) {
			e.preventDefault()

			if ( menuSearch.classList.contains( 'search-open' ) ) {
				// If search modal is open, close it.
				searchModal.classList.remove( 'search-open' )
				menuSearch.classList.remove( 'search-open' )
				menuSearch.setAttribute( 'aria-expanded', false )
			} else {
				// If search modal is closed, open it.
				searchModal.classList.add( 'search-open' )
				menuSearch.classList.add( 'search-open' )
				menuSearch.setAttribute( 'aria-expanded', true )
			}
		})

		// ! Search - hide search modal using ESC key.
		document.addEventListener('keyup', function (e) {
			const key = e.key
			if (key === 'Escape' && menuSearch.getAttribute('aria-expanded') === 'true') {
				menuSearch.setAttribute('aria-expanded', false)
				menuSearch.classList.remove( 'search-open' )
				menuSearch.focus()
				searchModal.classList.remove( 'search-open' )
			}
		})
	}
}
document.addEventListener( 'DOMContentLoaded', ready )
