// external js: packery.pkgd.js, draggabilly.pkgd.js

var $grid = $('.grid').packery({
    itemSelector: '.grid-item',
    columnWidth: 5,
    rowHeight: 5,
    resize: false
});

// make all grid-items draggable
$grid.find('.grid-item').each( function( i, gridItem ) {
    var draggie = new Draggabilly( gridItem );
    // bind drag events to Packery
    $grid.packery( 'bindDraggabillyEvents', draggie );
});