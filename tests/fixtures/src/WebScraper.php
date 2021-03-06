<?php
/**
 * @copyright 2009-2018 Vanilla Forums Inc.
 * @license Proprietary
 */

namespace VanillaTests\Fixtures;

/**
 * A PageInfo class, limited to local files.
 */
class WebScraper extends \Vanilla\WebScraper {
    /** @inheritDoc */
    protected $validSchemes = ['file'];
}
