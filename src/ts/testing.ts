interface IContact {
	name: string,
	email: string
}

function sendEmail(contact: IContact) {
	console.log(contact.name + " <" + contact.email + ">");
}

sendEmail({name: "Brandon Nourse", email: "bnourse@kelbymediagroup.com"});

sendEmail({name: "Brandon", email: "bnourse"});
