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
        $run_data = $insight->run($w, $_GET);
        /** @var InsightReportInterface $data */
        foreach ($run_data as $data) {
          $w->out('<h3>' . $data->title . "</h3>");
            $w->out(Html::table($data->data, null, "tablesorter", $data->header));
        }
    }
}