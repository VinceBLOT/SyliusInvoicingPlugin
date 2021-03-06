<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusInvoicingPlugin\FileGenerator;

use BitBag\SyliusInvoicingPlugin\Entity\InvoiceInterface;

final class InvoicePdfFilenameGenerator implements FilenameGeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateFilename(InvoiceInterface $invoice): string
    {
        $tokens = [
            $invoice->getOrder()->getNumber(),
            $invoice->getOrder()->getCreatedAt()->format('Ymd'),
            bin2hex(random_bytes(6)),
        ];

        return (string) implode('_', $tokens) . '.pdf';
    }
}
