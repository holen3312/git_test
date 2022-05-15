<pre>
<?php
class Newsletter

{
    public function send(): void
    {
        $user = new UserRepository();

        foreach ($user->getUsers() as $user) {
            if ($user["name"] === null || !filter_var($user["email"], FILTER_VALIDATE_EMAIL) || $user["email_sended"] !== 0) {
                continue;
            }
            echo "Email " . $user["email"] . " has been sent to user " . $user["name"] . '<br>';
            $user["email_sended"] = 1;
        }

    }

    public function sendPush()
    {
        $user = new UserRepository();
        foreach ($user->getUsers() as $user) {
            if ($user["device_id"] == null || $user["push_sended"] !== 0) {
                continue;
            }
            echo "Push notification has been sent to user " . $user["name"] . " with device_id " . $user["device_id"] . '<br>';
            $user["push_sended"] = 1;

        }
    }
}

class UserRepository
{
    public function getUsers(): array
    {
        return [
            [
                'name' => 'Ivan',
                'email' => 'ivan@test.com',
                'device_id' => 'Ks[dqweer4',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'name' => 'Peter',
                'email' => 'peter@test.com',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'name' => 'Mark',
                'device_id' => 'Ks[dqweer4',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'name' => 'Nina',
                'email' => '...',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'name' => 'Luke',
                'device_id' => 'vfehlfg43g',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'name' => 'Zerg',
                'device_id' => '',
                'email_sended' => 0,
                'push_sended' => 0
            ],
            [
                'email' => '...',
                'device_id' => '',
                'email_sended' => 0,
                'push_sended' => 0
            ]
        ];
    }
}

$sendLetter = new NewsLetter;
$sendLetter->send();
$sendLetter->sendPush();

?>
    </pre>
