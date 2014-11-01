index.php()
	-Automatically loads homepage.php or login.php

login.php()
	-User can login with username/password
	-Send form to login.php:
		-If same as database: redirect to homepage.php
		-else: reload page with error message

homepage.php()
	-Displays course search engine (Drawing #3)
	-User finds his course and clicking on it redirects to a course page

booklist.php(course_id)
	-Displays the books related to the course in a table
	-Books are displayed by Title (organized by ISBN)
		-Display Title, number for sale, edition and ISBN (see #BROWSE BOOK)
	-User clicks on a title (or w/e) to see the list of sellers/copies (#BROWSE 		BOOK)
	-When user clicks on BUY, redirects to confirm_buy.php

confirm_buy.php(specific_seller_entry)
	-Information about the seller and the book, costs this much.
	-Button: Confirm => Checks if transaction is possible
		-Transaction is initialized (QR code) so that the buyer can access it and show it to the seller
	=>Note: The transaction will occur (not through our website) when the QR code is scanned

sell_book.php()
	-Page where you enter information about selling a book.
		-Title, edition, ISBN, price
	-Store "This user is selling this book for this much"

current_transactions.php()
	-(On a sidebar)
	-Shows a list in a table of books that you are "going to buy"
	-Either leave the user to delete old transactions or our website knows which transactions were done.
	-You can click on a transaction, which brings you to qrcode.php

qrcode.php(transaction)
	-displays just the qr code for a specific transaction

*********
lib.php:
	-commonly used functions in php

When you sell a book, you have to enter the title, ISBN, edition