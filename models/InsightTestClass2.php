<?php

class InsightTestClass2 extends InsightBaseClass
{
    public $name="Test Insight 2";
    public $description="Test model for insights in creaturetopia respository";

    public function getFilters(Web $w): array
    {
    }

    public function run(Web $w, array $params = []): array
    {
    }
}