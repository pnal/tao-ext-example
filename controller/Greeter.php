<?php
/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2020 (original work) Open Assessment Technologies SA;
 *
 *
 */

namespace pnal\taoExample\controller;


class Greeter extends \tao_actions_CommonModule
{
    /**
     * @var string[]
     */
    private array $pilots;

    public function __construct()
    {
        parent::__construct();

        // Data for our example extension:
        $this->pilots = [
            'red_1' => 'luke',
            'red_2' => 'biggs',
            'red_3' => 'wedge',
        ];
    }

    public function getPilotsList()
    {
        $data = array(
            'data' => __("Pilots"),
            'attributes' => array(
                'id' => 1,
                'class' => 'node-class'
            ),
            'children' => array()
        );

        foreach ($this->pilots as $index => $name) {
            $data['children'][] = array(
                'data' => 'my name is ' . ucfirst($name),
                'attributes' => array(
                    'id' => $index,
                    'class' => 'node-instance'
                )
            );
        }
        echo json_encode($data);
    }

    public function vader()
    {
        $name = '';
        if ($this->hasRequestParameter('uri')) {
            $uri = $this->getRequestParameter('uri');
            if (array_key_exists($uri, $this->pilots)) {
                $name = $this->pilots[$uri];
            }
        }
        echo ucfirst($name) . ', I\'m your father';
    }

    public function obiwan()
    {
        $name = '';
        if ($this->hasRequestParameter('uri')) {
            $uri = $this->getRequestParameter('uri');
            if (array_key_exists($uri, $this->pilots)) {
                $name = $this->pilots[$uri];
            }
        }
        echo ucfirst($name) . ', may the force be with you';
    }
}