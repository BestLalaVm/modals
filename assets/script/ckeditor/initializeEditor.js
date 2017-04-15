﻿/**
 * Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/* exported initSample */

if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 460;
//CKEDITOR.config.width = 'auto';
CKEDITOR.config.width = "auto";

var initEditor = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		$(".editor").each(function(){
			var editorId = $(this).attr("id");
			var editorElement = CKEDITOR.document.getById(editorId);
			//var editorElement = $(".editor")[0];
			if(editorElement==null)
			{
			   return;	
			}
			// :(((
			if ( isBBCodeBuiltIn ) {
				editorElement.setHtml(
					'Hello world!\n\n' +
					'I\'m an instance of [url=http://ckeditor.com]CKEditor[/url].'
				);
			}

			// Depending on the wysiwygare plugin availability initialize classic or inline editor.
			if ( wysiwygareaAvailable ) {
				CKEDITOR.replace( editorId);
			} else {
				editorElement.setAttribute( 'contenteditable', 'true' );
				CKEDITOR.inline( editorId );

				// TODO we can consider displaying some info box that
				// without wysiwygarea the classic editor may not work.
			}
		})	
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();


$(function(){
	initEditor();
});
