<?php

namespace App\Dealcloser\Validation;

class DomainValidation
{
    /**
     * Check if domain is valid.
     *
     * @param string $domains
     * @param string $email
     *
     * @return bool
     */
    public function isValid($domains, $email)
    {
        if (!is_null($domains)) {
            $domains = str_replace(' ', '', $domains);

            return collect(explode(',', $domains))->contains(function ($domain) use ($email) {
                return $this->getDomain($email) == $domain;
            });
        }

        return true;
    }

    /**
     * Return position from @ symbol.
     *
     * @param string $email
     *
     * @return int
     */
    private function getPosOfAt(string $email)
    {
        return strpos($email, '@') + 1;
    }

    /**
     * Get only the domain from email.
     *
     * @param string $email
     *
     * @return string
     */
    public function getDomain(string $email)
    {
        return substr($email, $this->getPosOfAt($email));
    }
}
