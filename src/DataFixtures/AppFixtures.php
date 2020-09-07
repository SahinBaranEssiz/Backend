<?php

namespace App\DataFixtures;

use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $reader = new Xlsx();
        $reader->setReadDataOnly(false);
        $spreadsheet = $reader->load("public/uploads/dataFull.xlsx");

        //USERS

        $spreadsheet->setActiveSheetIndex(2);
        $worksheet = $spreadsheet->getActiveSheet();

        $rowCount = $worksheet->getHighestRow();


        print("\n\nGetting users...\n\n");
        for ($row = 2; $row <= $rowCount; $row++)
        {
            $user = new User();

            $user->setGender($worksheet->getCellByColumnAndRow(2,$row)->getValue());
            $user->setType($worksheet->getCellByColumnAndRow(3,$row)->getValue());
            $user->setAge($worksheet->getCellByColumnAndRow(4,$row)->getValue());
            $user->setNationality($worksheet->getCellByColumnAndRow(5,$row)->getValue());
            $user->setIsUser(($worksheet->getCellByColumnAndRow(6,$row)->getValue() == 'uye')? true : false);
            $user->setPoint($worksheet->getCellByColumnAndRow(7,$row)->getValue());
            $user->setCluster($worksheet->getCellByColumnAndRow(8,$row)->getValue());


            $manager->persist($user);

        }
        $manager->flush();

        //TRANSACTIONS
        $spreadsheet->setActiveSheetIndex(3);
        $worksheet = $spreadsheet->getActiveSheet();

        $rowCount = $worksheet->getHighestRow();


        print("\n\nGetting transactions...\n\n");
        for ($row = 2; $row <= $rowCount; $row++)
        {
            $transaction = new Transaction();


            $id = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
            $user = $manager->getRepository(User::class)->find($id);

            $transaction->setUser($user);
            $transaction->setOrigin($worksheet->getCellByColumnAndRow(2,$row)->getValue());
            $transaction->setDestination($worksheet->getCellByColumnAndRow(3,$row)->getValue());

            $departure = $worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue();
            $departure = date('Y-m-d H:i:s', strtotime($departure));

            $transaction->setDeparture(new \DateTime($departure));

            $transaction->setIsOneway(($worksheet->getCellByColumnAndRow(5,$row)->getValue() == 'tek yon')? true : false);
            $transaction->setAmount($worksheet->getCellByColumnAndRow(6,$row)->getValue());
            $transaction->setEconomy(($worksheet->getCellByColumnAndRow(7,$row)->getValue() == 'economy')? true : false);
            $transaction->setBig(($worksheet->getCellByColumnAndRow(8,$row)->getValue() == 'bigli')? true : false);
            $transaction->setSs(($worksheet->getCellByColumnAndRow(9,$row)->getValue() == 'sigortali')? true : false);
            $transaction->setPromo($worksheet->getCellByColumnAndRow(10,$row)->getValue());
            $transaction->setEnvironment($worksheet->getCellByColumnAndRow(11,$row)->getValue());

            $ticketDay = $worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue();
            $ticketDay = date('Y-m-d H:i:s', strtotime($ticketDay));
            $transaction->setTicketDate(new \DateTime($ticketDay));

            $transaction->setAirline($worksheet->getCellByColumnAndRow(13,$row)->getValue());
            $transaction->setPassenger($worksheet->getCellByColumnAndRow(14,$row)->getValue());
            $transaction->setSenior($worksheet->getCellByColumnAndRow(15,$row)->getValue());
            $transaction->setAdult($worksheet->getCellByColumnAndRow(16,$row)->getValue());
            $transaction->setStudent($worksheet->getCellByColumnAndRow(17,$row)->getValue());
            $transaction->setChild($worksheet->getCellByColumnAndRow(18,$row)->getValue());
            $transaction->setWoman($worksheet->getCellByColumnAndRow(19,$row)->getValue());
            $transaction->setMan($worksheet->getCellByColumnAndRow(20,$row)->getValue());
            $transaction->setTransactionStatus($worksheet->getCellByColumnAndRow(21,$row)->getValue());
            $transaction->setHasInstallment(($worksheet->getCellByColumnAndRow(22,$row)->getValue() == 'taksitli')? true : false);
            $transaction->setDtf($worksheet->getCellByColumnAndRow(23,$row)->getValue());

            $manager->persist($transaction);

        }
        $manager->flush();
        print("\n\nOk!\n\n");
        // $product = new Product();
        // $manager->persist($product);

        // $manager->flush();
    }
}
