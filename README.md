## Singleton Pattern (OOP) - Example

We are sharing some simple PHP code, showing the use of
the [Singleton Pattern](https://en.wikipedia.org/wiki/Singleton_pattern). You will see how modern
versions of PHP, supporting Classes and Abstract Classes, make it easy to implement the Singleton Pattern using this
language.

You can find the PHP 8.1 code
at [/app/src](https://github.com/harryrampr/OPP_Singleton_Pattern-Connection_Pool_Example/tree/master/app/src), there is
testing at [/tests](https://github.com/harryrampr/OPP_Singleton_Pattern-Connection_Pool_Example/tree/master/app/tests)
directory. HTML output with Tailwind CSS can be found
at [/app/public](https://github.com/harryrampr/OPP_Singleton_Pattern-Connection_Pool_Example/tree/master/app/public)
directory.

### About the Pattern

The Singleton pattern is a creational design pattern
in [object-oriented programming](https://en.wikipedia.org/wiki/Object-oriented_programming) that ensures a class has
only one instance and provides a global point of access to that instance. It involves restricting the instantiation of a
class to a single object, typically shared across the entire application.

### History

The Singleton pattern was first introduced by the Gang of Four (GoF) in their book ["Design Patterns: Elements of
Reusable Object-Oriented Software"](https://en.wikipedia.org/wiki/Design_Patterns), published in 1994. The book,
authored by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides, cataloged various design patterns commonly
used in object-oriented programming.

The concept of the Singleton pattern predates its formal description in the GoF book. It can be traced back to the early
days of software development, where the need to ensure a single instance of a class arose in different contexts.

The Singleton pattern gained popularity as a solution to problems requiring a global point of access to a unique
resource or functionality. It provides a way to control the instantiation of a class, ensuring that only one instance
exists throughout the application.

### Intent

The intent of the Singleton pattern is to control object creation, limit the number of instances to one, and provide a
centralized point of access to that single instance. It ensures that a class has only one instance throughout the
application and facilitates the coordination and sharing of this instance among different components.

### Structure

The Singleton pattern consists of the Singleton component, which represents the class designed to have a single
instance. The Singleton typically provides a static method to access the instance, ensuring that only one instance of
the class exists. This component may also contain additional methods and properties specific to the singleton object.

### How it Works

1. The Singleton class defines a private constructor to prevent direct instantiation of the class from outside.
2. It provides a static method, often named getInstance(), which is responsible for creating the instance of the class (
   if it doesn't exist) and returning it.
3. The first time getInstance() is called, it creates a new instance of the class and stores it in a static variable
   within the class.
4. On subsequent calls to getInstance(), the method returns the already existing instance stored in the static variable.
5. The singleton instance can then be accessed and used by other parts of the application through the getInstance()
   method.

### Benefits

- Provides a single, global point of access to an object instance, ensuring that there is only one instance throughout
  the application.
- Guarantees the uniqueness of the object, preventing multiple instances from being created.
- Facilitates the sharing of the singleton instance among different parts of the application, promoting consistency and
  centralized access to resources.
- Enables lazy initialization, where the instance is created only when it is first needed, improving performance and
  memory usage.
- Simplifies the management of shared resources and settings that should have a single point of control.
- Supports the concept of a "global state" or "global configuration" by encapsulating it within a singleton object.

### Applications

- **Logging:** The Singleton pattern is often used in logging systems to ensure that there is a single, centralized
  logger instance shared by different components in an application. This allows consistent logging behavior and provides
  a global access point for logging functionality.

- **Configuration Settings:** Singleton can be used to manage global configuration settings. The instance of the
  Singleton class can hold the configuration values, and these values can be accessed and modified from various parts of
  the application.

- **Database Connection Pool:** In applications that require database connectivity, the Singleton pattern can be used to
  create and manage a connection pool. The Singleton instance holds the pool of database connections, allowing multiple
  parts of the application to reuse connections efficiently.

- **Caching:** Singleton can be used in caching systems to store and retrieve frequently accessed data. The Singleton
  instance manages the cache, ensuring that all parts of the application access the same cache object.

- **Thread Pool:** Singleton can be employed to create and manage a thread pool in multithreaded applications. The
  Singleton instance would maintain a pool of threads that can be used for executing concurrent tasks.

- **GUI Components:** Singleton can be used to represent GUI components that need to be accessed from different parts of
  an application. For example, a window manager or a dialog box manager can be implemented as a Singleton to handle the
  creation and management of GUI components.

- **Print Spooler:** In printing systems, a Singleton can be used to implement a print spooler that manages the printing
  queue and coordinates the printing tasks across the application.

- **File Manager:** Singleton can be employed to implement a file manager that provides a centralized point of access
  for file operations and handles file-related tasks such as reading, writing, and managing file resources.

### Other Examples

A logging system in a software application is a classic example of the Singleton pattern. The Singleton class, such as
the Logger class, ensures that there is only one instance of the logger throughout the application. It has a private
constructor to prevent direct instantiation and a static method, like getInstance(), to provide access to the logger
instance. Other parts of the application can access the logger using Logger.getInstance(), which returns the existing
logger instance or creates a new one if it doesn't exist. This approach allows all components to share the same logger
instance, enabling consistent logging to a single log file or output stream.