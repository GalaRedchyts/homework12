<?php

class Contact {
    public string $name;
    public string $surname;
    public string $email;
    public int $phone;
    public string $address;

    public function __construct() {}
}
interface ContactBuilder {
    public function setName();
    public function setSurname();
    public function setEmail();
    public function setPhone();
    public function setAddress();
    public function getContact();
}
class YourContact implements ContactBuilder {

    private $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function setName(): static
    {
        $this->contact->name = "John";
        return $this;
    }
    public function setSurname(): static
    {
        $this->contact->surname = "Surname";
        return $this;
    }
    public function setEmail(): static
    {
        $this->contact->email = "john@email.com";
        return $this;
    }
    public function setPhone(): static
    {
        $this->contact->phone = "098745213";
        return $this;
    }
    public function setAddress(): static
    {
        $this->contact->address = "Some address";
        return $this;
    }
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
class ContactDirector{
    public function build(ContactBuilder $builder) {
        $builder->setName()
       ->setSurname()
       ->setEmail()
        ->setPhone()
        ->setAddress();
        return $builder->getContact();
    }
}

$YourContact = (new ContactDirector())->build(new YourContact(new Contact()));



