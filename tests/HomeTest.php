<?php

class HomeTest extends TestCase {

	/**
	 * Ensure the home page is accessible
	 *
	 * @return void
	 */
	public function testHomePageAccessibility()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

  public function testUserSeesWelcomeMessage()
  {
    $crawler = $this->client->request('GET', '/');
    $this->assertCount(1, $crawler->filter('h1:contains("Welcome to TODOParrot")'));
  }
  
  public function testUserSeesRegisterLinkWhenNotLoggedIn()
  {
    $crawler = $this->client->request('GET', '/');
    $this->assertCount(1, $crawler->filter('li:contains("Create Account")'));
  }

  public function testUserSeesSignInLinkWhenNotLoggedIn()
  {
    $crawler = $this->client->request('GET', '/');
    $this->assertCount(1, $crawler->filter('li:contains("Sign In")'));
  }
}
