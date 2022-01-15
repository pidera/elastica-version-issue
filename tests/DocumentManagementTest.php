<?php
declare(strict_types=1);

use Elastica\Client;
use PHPUnit\Framework\TestCase;

final class DocumentManagementTest extends TestCase
{
    public function testAddingDocumentToAliasIndex(): void
    {
        $client = new Client(['port' => 9201]);

        $index = $client->getIndex('documents');
        $aliasIndex = $client->getIndex('documents_alias');

        $document = $index->createDocument('doc_1', ['title' => 'My document']);

        $index->addDocument($document);
        $index->refresh();

        $documentFromIndex = $index->getDocument('doc_1');

        $aliasIndex->addDocument($documentFromIndex);
        $aliasIndex->refresh();

        $documentFromAliasIndex = $aliasIndex->getDocument('doc_1');

        self::assertEquals('My document', $documentFromAliasIndex->get('title'));
    }
}
