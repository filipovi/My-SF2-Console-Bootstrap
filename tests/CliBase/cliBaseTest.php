<?php
/*
 * This file is part of the Symfony CLI Bootstrap
 *
 * (c) Pascal Filipovicz <pascal.filipovicz@frozenk.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace CliBase;

class CliBaseTest extends \PHPUnit_Framework_TestCase
{
   protected function getEntity()
    {
        return $this->getMockForAbstractClass('CliBase\Entity\CliBase');
    }

    public function testId()
    {
        $entity = $this->getEntity();

        $this->assertNull($entity->getId());
        $entity->setId(1);
        $this->assertEquals(1, $entity->getId());
    }
}
