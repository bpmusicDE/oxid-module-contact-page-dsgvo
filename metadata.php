<?php
/**
 * This file is part of BPMusics Contactpage (DSGVO) for Oxid
 *
 * OXID free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with BPMusics Contactpage (DSGVO) module.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * BPMusics Contactpage (DSGVO) is distributed in the hope that it will
 * be useful.
 * 
 * @link      http://www.bpmusic.de
 * @copyright (C) BPMusic - Benjamin Pietzner Music
 * @license   MIT - read below
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
 * copies of the Software, and to permit persons to whom the Software is 
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'bpmcontactpage',
    'title'        => 'Minimale Kontaktseite',
    'description'  => array(
        'de' => 'Modul mit minimalem Kontaktformular & wählbar Karte/Link/nichts zu Gmaps (DSGVO)',
        'en' => 'Module with minimal contactform & select for map/link/none to Gmaps (DGSVO).',
    ),
    'version'      => '1.0.0',
    'author'       => 'Benjamin Pietzner',
    'url'          => 'http://www.bpmusic.de',
    'email'        => 'info@bpmusic.de',

    'extend'       => array(
        \OxidEsales\Eshop\Application\Controller\ContactController::class => \BPMusic\ContactPageModule\Controller\ContactController::class,
    ),

    'controllers' => array(
        'bpmusiccontactpagecontactcontroller' => \BPMusic\ContactPage\Controller\ContactController::class,
    ),

    'templates' => array(
        'contact.tpl' => 'bpmusic/contactpage/views/tpl/page/info/contact.tpl',
        'contact-form.tpl' => 'bpmusic/contactpage/views/tpl/form/contact.tpl'
    ),

    'blocks' => array(
/*
        array(
          'template' => 'form/contact.tpl',
          'block' => 'contact_form_fields',
          'file' => '/views/blocks/contact-form-fields.tpl'
        ),
*/
     ),

    'settings' => array(
        array(
          'group' => 'bpmusic_contactpage',
          'name' => 'blBPMContactPageGMaps',
          'type' => 'select',
          'constrains' => 'link|map|none',
          'value' => 'link'
        ),
    )
);
