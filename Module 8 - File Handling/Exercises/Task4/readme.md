## 🧩 Task 4: List and Delete Files

Given a folder `uploads/`:
- List all files inside  
- Allow user to delete one via GET parameter  
  Example URL: `delete.php?file=photo.jpg`  

In `delete.php`:
- Check if file exists  
- Delete it  
- Redirect back to list page  

⚠️ Make sure user can't delete outside `uploads/` (no `../` attacks)

✅ **Deliverable**: Paste your PHP code.
