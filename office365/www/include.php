<?php

if (!defined("PENTEST")) {
    die("Hello, world!");
}

class Runtime {
    public string $hits = './hits.csv';
    public string $logins = './logins.csv';

    public function addHit($ip)
    {
        $this->addLineToCsv($this->hits, [
            $this->getIsoDate(),
            $ip
        ]);
    }

    public function addLogin($ip, $username)
    {
        $this->addLineToCsv($this->logins, [
            $this->getIsoDate(),
            $ip,
            $username
        ]);
    }

    private function getIsoDate()
    {
        return (new \DateTime())->format("Y-m-d H:i:s");
    }

    private function addLineToCsv(string $filename, array $line)
    {
        if ($fh = fopen($filename, "a")) {
            fputcsv($fh, $line);
            fclose($fh);
        }
    }

}