.. _dojox/editor/plugins/Blockquote:

===============================
dojox.editor.plugins.Blockquote
===============================

:Authors: Jared Jurkiewicz
:Project owner: Jared Jurkiewicz
:since: V1.5

.. contents ::
    :depth: 2

Have you ever wanted to set apart a section of text in your document as a 'quotation' of something someone else has said?  Have you ever wanted to remove quotation indication from a section of text in your document?  If so, then this plugin is for you!

Features
========

Once required in and enabled, this plugin provides the following features to dijit.Editor.

* Button with icon in toolbar for toggling selections and sections of text as <blockquote> wrapped or not.
* Handles blockquoting a section from current cursor position as well as blockquoting the selected section of the document as best it can determine.
* Updates its blockquote status based on whether or not the cursor is positioned inside a blockquoted section of the document.

Usage
=====

Basic Usage
-----------
Usage of this plugin is quite simple and painless.

First include the CSS for it.  For example:

.. css ::

    @import "dojox/editor/plugins/resources/css/Blockquote.css";

Then require it into the page where you're using the editor:

.. js ::
 
    dojo.require("dijit.Editor");
    dojo.require("dojox.editor.plugins.Blockquote");


Once it has been required in, all you have to do is include it in the list of extraPlugins (or the plugins property if you're reorganizing the toolbar) for you want to load into the editor.  For example:

.. html ::

  <div data-dojo-type="dijit.Editor" id="editor" data-dojo-props="extraPlugins:['blockquote']"></div>


And that's it.  The editor instance you can reference by 'dijit.byId("editor")' is now enabled with the Blockqupte plugin!  You can use the button to toggle the quotation mode of the text underneath the cursor in the document, or across a selection of text in the document.

Examples
========

Basic Usage
-----------

.. code-example::
  :djConfig: parseOnLoad: true
  :version: 1.4

  .. js ::

      dojo.require("dijit.form.Button");
      dojo.require("dijit.Editor");
      dojo.require("dojox.editor.plugins.Blockquote");

  .. css ::

      @import "{{baseUrl}}dojox/editor/plugins/resources/css/Blockquote.css";
    
  .. html ::

    <b>Move the cursor around and select blockquote to blockquote a section of the document.</b>
    <br>
    <div data-dojo-type="dijit.Editor" height="250px" id="input" data-dojo-props="extraPlugins:['blockquote']">
    <div>
    <br>
    blah blah & blah!
    <br>
    </div>
    <br>
    <table>
    <tbody>
    <tr>
    <td style="border-style:solid; border-width: 2px; border-color: gray;">One cell</td>
    <td style="border-style:solid; border-width: 2px; border-color: gray;">
    Two cell
    </td>
    </tr>
    </tbody>
    </table>
    <ul>
    <li>item one</li>
    <li>
    item two
    </li>
    </ul>
    </div>

See Also
========

* :ref:`dijit.Editor <dijit/Editor>`
* :ref:`dijit._editor.plugins <dijit/_editor/plugins>`
* :ref:`dojox.editor.plugins <dojox/editor/plugins>`
