<?php
namespace Dotmailer\Entity;

final class Suppression implements Arrayable
{
	const REASON_UNSUBSCRIBED = 'Unsubscribed'; // The contact is unsubscribed from your communications
	const REASON_SOFTBOUNCED = 'SoftBounced'; // The contact’s address is temporarily unavailable, possibly because their mailbox is too full, or their mail server won’t accept a message of the size sent, or their server is having temporary issues accepting any mail
	const REASON_HARDBOUNCED = 'HardBounced'; // The contact’s address is permanently unreachable, most likely because they, or the server they were hosted on, does not exist
	const REASON_ISPCOMPLAINED = 'IspComplained'; // The contact has submitted a spam complaint to us via their internet service provider
	const REASON_MAILBLOCKED = 'MailBlocked'; // The mail server indicated that it didn’t want to receive the mail. No reason was given
	const REASON_DIRECTCOMPLAINT = 'DirectComplaint'; // The contact has complained directly to either us, a hosting facility or possibly even a blacklist about receiving your communications
	const REASON_SUPPRESSED = 'Suppressed'; // The contact that has been actively suppressed by you in your account
	const REASON_NOTALLOWED = 'NotAllowed'; // The contact's email address is fully blocked from our system
	const REASON_DOMAINSUPPRESSION = 'DomainSuppression'; // The contact’s email domain is on your domain suppression list
	const REASON_NOMXREECORD = 'NoMxRecord'; // The contact’s email domain does not have an MX DNS record. A mail exchange record provides the address of the mail server for that domain.

	/**
	 * @var Contact
	 */
	private $suppressedContact;

	/**
	 * @var \DateTime
	 */
	private $dateRemoved;

	/**
	 * @var string
	 */
	private $reason;

	/**
	 * @param int|null $id
	 * @param \DateTime $dateRemoved
	 * @param string $reason
	 */
	public function __construct(
		Contact $suppressedContact,
		\DateTime $dateRemoved,
		string $reason
	) {
		$this->id = $suppressedContact;
		$this->email = $dateRemoved;
		$this->optInType = $reason;
	}

	/**
	 * @inheritdoc
	 */
	public function asArray(): array
	{
		return [
			'suppressedContact' => $this->suppressedContact,
			'dateRemoved' => $this->dateRemoved,
			'reason' => $this->reason,
		];
	}
}