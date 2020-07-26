<?php

namespace App\Repository;

use App\Models\Performance;

class PerformanceRepository
{
    private Performance $eloquentPerformance;

    public function __construct(
        Performance $eloquentPerformance
    ) {
        $this->eloquentPerformance = $eloquentPerformance;
    }

    public function createPerformance(
        int $companyId,
        string $label,
        array $performances
    ): Performance {
        return $this->eloquentPerformance
            ->updateOrCreate([
                'company_id' => $companyId,
                'label'      => $label,
                'FY1980'     => $performances['1980'],
                'FY1981'     => $performances['1981'],
                'FY1982'     => $performances['1982'],
                'FY1983'     => $performances['1983'],
                'FY1984'     => $performances['1984'],
                'FY1985'     => $performances['1985'],
                'FY1986'     => $performances['1986'],
                'FY1987'     => $performances['1987'],
                'FY1988'     => $performances['1988'],
                'FY1989'     => $performances['1989'],
                'FY1990'     => $performances['1990'],
                'FY1991'     => $performances['1991'],
                'FY1992'     => $performances['1992'],
                'FY1993'     => $performances['1993'],
                'FY1994'     => $performances['1994'],
                'FY1995'     => $performances['1995'],
                'FY1996'     => $performances['1996'],
                'FY1997'     => $performances['1997'],
                'FY1998'     => $performances['1998'],
                'FY1999'     => $performances['1999'],
                'FY2000'     => $performances['2000'],
                'FY2001'     => $performances['2001'],
                'FY2002'     => $performances['2002'],
                'FY2003'     => $performances['2003'],
                'FY2004'     => $performances['2004'],
                'FY2005'     => $performances['2005'],
                'FY2006'     => $performances['2006'],
                'FY2007'     => $performances['2007'],
                'FY2008'     => $performances['2008'],
                'FY2009'     => $performances['2009'],
                'FY2010'     => $performances['2010'],
                'FY2011'     => $performances['2011'],
                'FY2012'     => $performances['2012'],
                'FY2013'     => $performances['2013'],
                'FY2014'     => $performances['2014'],
                'FY2015'     => $performances['2015'],
                'FY2016'     => $performances['2016'],
                'FY2017'     => $performances['2017'],
                'FY2018'     => $performances['2018'],
                'FY2019'     => $performances['2019'],
                'FY2020'     => $performances['2020'],
            ]);
    }
}
