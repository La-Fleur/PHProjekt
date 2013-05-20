<?php
/**
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 3 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * @copyright  Copyright (c) 2010 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL v3 (See LICENSE file)
 */


/**
 * Tests for Language Adapter
 *
 * @group      phprojekt
 * @group      language
 * @group      adapter
 * @group      phprojekt-language
 * @group      phprojekt-language-adapter
 */
class Phprojekt_LanguageAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test name of the class
     */
    public function testToString()
    {
        $lang   = new Phprojekt_LanguageAdapter(array('locale' => 'es', 'content' => '-'));
        $string = $lang->toString();
        $this->assertEquals('Phprojekt', $string);
    }

    /**
     * Test all the lang files using the const defined
     */
    public function testAllFiles()
    {
        $reflect = new ReflectionClass('Phprojekt_LanguageAdapter');
        $constants = $reflect->getConstants();
        $runs = 0;
        foreach ($constants as $value) {
            if (strstr($value, 'inc.php')) {
                $value = str_replace('.inc.php', '', $value);
                new Phprojekt_Language(array('locale' => $value));
                $runs++;
            }
        }
        $this->assertGreaterThan(0, $runs);
    }
}
