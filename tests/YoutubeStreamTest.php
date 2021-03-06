<?php

/**
 * YoutubeStreamTest class.
 */

namespace Alltube\Test;

use Alltube\Config;
use Alltube\Exception\ConfigException;
use Alltube\Library\Exception\AlltubeLibraryException;
use Alltube\Stream\YoutubeStream;

/**
 * Unit tests for the YoutubeStream class.
 * @requires download
 */
class YoutubeStreamTest extends StreamTest
{
    /**
     * Prepare tests.
     * @throws ConfigException|AlltubeLibraryException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $config = Config::getInstance();
        $downloader = $config->getDownloader();
        $video = $downloader->getVideo('https://www.youtube.com/watch?v=dQw4w9WgXcQ', '135');

        $this->stream = new YoutubeStream($downloader, $video);
    }

    /**
     * Test the getMetadata() function.
     *
     * @return void
     */
    public function testGetMetadataWithKey()
    {
        $this->assertNull($this->stream->getMetadata('foo'));
    }

    /**
     * Test the detach() function.
     *
     * @return void
     */
    public function testDetach()
    {
        $this->assertNull($this->stream->detach());
    }
}
