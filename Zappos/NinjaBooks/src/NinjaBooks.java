/**
 * Creates a Java Swing frame that allows user to add or remove books from a virtual shelf
 * 
 * Created 12/19/12
 * 
 * @author Sidney Quitorio
 */

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.lang.reflect.Array;
import java.util.Arrays;

import javax.swing.*;


public class NinjaBooks {
	
	//Set variables and booklist
	private static int heigth = 600;
	private static int width = 1000;
	private static String[] bookList = {"Introduction to Ninja Stars", "The Complex Guide of Seppuku",
				 "Planes Trains and Horses", "Assasination For Dummies",};
	private static JPanel bookPanel;
	private static JFrame mainFrame;
	private static String[] booksToPrint;
	
	public static void main(String[] args) {	
		booksToPrint = new String[bookList.length];
		
		//Sets up JFrame, button box, and book panel
		mainFrame = new JFrame();
		mainFrame.setSize(width, heigth);
		mainFrame.setTitle("Choose books to add to shelf");
		bookPanel = new JPanel();
		Box buttonBox = Box.createHorizontalBox();
		mainFrame.add(buttonBox, "North");
		mainFrame.add(bookPanel);
		
		//Creates button to add/remove books
		for(int i = 0; i < bookList.length; i++) {
			JButton button = new JButton(bookList[i]);
			button.addActionListener(addBookToShelf(i));
			buttonBox.add(button);
		}
	
		mainFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	    mainFrame.setVisible(true);
	}
	
	
	/**
	 * Button action listener to add or remove a book from the shelf
	 * @param aBookToAdd : The index of the book you want to add or remove
	 * @return The button action listener
	 */
	public static ActionListener addBookToShelf(final int aBookToAdd) {

		return new ActionListener() {

			public void actionPerformed(ActionEvent event) {
				//Updates the frame
				bookPanel.removeAll();
				bookPanel.revalidate();
				bookPanel.repaint();
				mainFrame.invalidate();
				mainFrame.validate();

				String[] sortedArray = checkAndSort(aBookToAdd);
				
				//Adds the book vertically to the panel
				for(int i = 0; i < sortedArray.length; i++) {
					if(sortedArray[i] != null) {
						String book = sortedArray[i];
						char[] bookName = book.toCharArray();
						//Creates a JLabel that will print the book name going vertically down
						String bookDisplay = "";
						for(int j = 0; j < bookName.length-1; j++) {
							bookDisplay += bookName[j] + "<br>";
						}
						bookDisplay += bookName[bookName.length-1];
						bookDisplay = "<html>" + bookDisplay + "</html>";
						JLabel bookLabel = new JLabel(bookDisplay);
						bookPanel.add(bookLabel);
					}
				}

			}
		};
	}
	
	/**
	 * This method will look at the book to be added, see if it is on the shelf already, and determine
	 * whether it should be added or removed. Then it will return the sorted list of books on the
	 * shelf
	 * @param aBookToAdd: The index of the book in question
	 * @return The sorted array of books on the shelf
	 */
	public static String[] checkAndSort(int aBookToAdd) {
		//Checks if the book is on the shelf already. Removes or add it to shelf array
		if(booksToPrint[aBookToAdd] == null) {
			booksToPrint[aBookToAdd] = bookList[aBookToAdd];
		}
		else {
			booksToPrint[aBookToAdd] = null;
		}
		
		//Checks how many books are on the shelf
		int numberOfNonEmptyBooks = 0;
		for(int i = 0; i < booksToPrint.length; i++) {
			if(booksToPrint[i] != null) {
				numberOfNonEmptyBooks++;
			}
		}
		
		//Sort the books into a new array
		String[] sortedArray = new String[numberOfNonEmptyBooks];
		int sortedArrayIndex = 0;
		for(int i = 0; i < booksToPrint.length; i++) {
			if(booksToPrint[i] != null) {
				sortedArray[sortedArrayIndex] = booksToPrint[i];
				sortedArrayIndex++;
			}
		}
		Arrays.sort(sortedArray);
		
		return sortedArray;
	}
	


}
